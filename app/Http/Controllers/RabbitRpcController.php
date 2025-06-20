<?php

namespace App\Http\Controllers;

use App\Utils\HttpResponse;
use App\Utils\HttpResponseCode;
use Illuminate\Http\Request;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Exception\AMQPTimeoutException;
use Ramsey\Uuid\Uuid;
use Exception;

class RabbitRpcController extends Controller
{
    use HttpResponse;
    public function callMemberService()
    {
        $connection = null;
        $channel = null;

        try {

            $connection = new AMQPStreamConnection(
                config('queue.connections.rabbitmq.host'),
                config('queue.connections.rabbitmq.port'),
                config('queue.connections.rabbitmq.user'),
                config('queue.connections.rabbitmq.password'),
            );
            $channel = $connection->channel();

            list($callbackQueue,,) = $channel->queue_declare("", false, false, true, false);

            $correlationId = Uuid::uuid4()->toString();

            $data = json_encode([
                'method' => 'get_all_employees',
                'args' => [1],
            ]);

            $msg = new AMQPMessage($data, [
                'correlation_id' => $correlationId,
                'reply_to' => $callbackQueue,
            ]);

            $channel->basic_publish($msg, '', 'rpc-queue');

            $response = null;
            $channel->basic_consume(
                $callbackQueue,
                '',
                false,
                true,
                false,
                false,
                function ($rep) use (&$response, $correlationId) {
                    if ($rep->get('correlation_id') == $correlationId) {
                        $response = $rep->body;
                    }
                }
            );

            $timeout = 10;
            while (!$response) {
                $channel->wait(null, false, $timeout);
            }

            return response()->json([
                'status' => 'success',
                'data' => json_decode($response ?? '{}'),
            ]);
        } catch (AMQPTimeoutException $e) {
            return $this->error('Request to Member Service timed out.', HttpResponseCode::HTTP_SERVICE_UNAVAILABLE);
        } catch (Exception $e) {
            return $this->error('Could not connect to backend service.', HttpResponseCode::HTTP_SERVICE_UNAVAILABLE);
        } finally {

            if ($channel) {
                $channel->close();
            }
            if ($connection) {
                $connection->close();
            }
        }
    }
}
