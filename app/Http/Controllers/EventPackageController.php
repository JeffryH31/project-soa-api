<?php

namespace App\Http\Controllers;

use App\Models\EventPackage;
use App\Models\EventSpace;
use App\Models\EventMenu;
use App\Models\EventAddOn;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EventPackageController extends Controller
{
    /**
     * Display a listing of event packages
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $query = EventPackage::with(['eventSpace', 'eventMenus', 'eventAddOns']);

            // Search functionality
            if ($request->has('search')) {
                $search = $request->get('search');
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            }

            // Filter by price range
            if ($request->has('min_price')) {
                $query->where('price', '>=', $request->get('min_price'));
            }
            if ($request->has('max_price')) {
                $query->where('price', '<=', $request->get('max_price'));
            }

            // Filter by pax range
            if ($request->has('min_pax')) {
                $query->where('pax', '>=', $request->get('min_pax'));
            }
            if ($request->has('max_pax')) {
                $query->where('pax', '<=', $request->get('max_pax'));
            }

            // Filter by event space
            if ($request->has('event_space_id')) {
                $query->where('event_space_id', $request->get('event_space_id'));
            }

            // Sorting
            $sortBy = $request->get('sort_by', 'created_at');
            $sortOrder = $request->get('sort_order', 'desc');
            $query->orderBy($sortBy, $sortOrder);

            // Pagination
            $perPage = $request->get('per_page', 15);
            $packages = $query->paginate($perPage);

            return response()->json([
                'success' => true,
                'message' => 'Event packages retrieved successfully',
                'data' => $packages->items(),
                'pagination' => [
                    'current_page' => $packages->currentPage(),
                    'last_page' => $packages->lastPage(),
                    'per_page' => $packages->perPage(),
                    'total' => $packages->total(),
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve event packages',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created event package
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'pax' => 'required|integer|min:1',
                'event_space_id' => 'required|uuid|exists:event_spaces,id',
                'menu_ids' => 'array',
                'menu_ids.*' => 'uuid|exists:event_menus,id',
                'addon_ids' => 'array',
                'addon_ids.*' => 'uuid|exists:event_add_ons,id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            DB::beginTransaction();

            $eventPackage = EventPackage::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'pax' => $request->pax,
                'event_space_id' => $request->event_space_id,
            ]);

            // Attach menu items if provided
            if ($request->has('menu_ids')) {
                $eventPackage->eventMenus()->attach($request->menu_ids);
            }

            // Attach add-ons if provided
            if ($request->has('addon_ids')) {
                $eventPackage->eventAddOns()->attach($request->addon_ids);
            }

            DB::commit();

            // Load relationships for response
            $eventPackage->load(['eventSpace', 'eventMenus', 'eventAddOns']);

            return response()->json([
                'success' => true,
                'message' => 'Event package created successfully',
                'data' => $eventPackage
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to create event package',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified event package
     */
    public function show(string $id): JsonResponse
    {
        try {
            $eventPackage = EventPackage::with(['eventSpace', 'eventMenus', 'eventAddOns'])
                ->findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Event package retrieved successfully',
                'data' => $eventPackage
            ], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Event package not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve event package',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified event package
     */
    public function update(Request $request, string $id): JsonResponse
    {
        try {
            $eventPackage = EventPackage::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'name' => 'sometimes|required|string|max:255',
                'description' => 'sometimes|required|string',
                'price' => 'sometimes|required|numeric|min:0',
                'pax' => 'sometimes|required|integer|min:1',
                'event_space_id' => 'sometimes|required|uuid|exists:event_spaces,id',
                'menu_ids' => 'sometimes|array',
                'menu_ids.*' => 'uuid|exists:event_menus,id',
                'addon_ids' => 'sometimes|array',
                'addon_ids.*' => 'uuid|exists:event_add_ons,id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            DB::beginTransaction();

            $eventPackage->update($request->only([
                'name', 'description', 'price', 'pax', 'event_space_id'
            ]));

            // Update menu items if provided
            if ($request->has('menu_ids')) {
                $eventPackage->eventMenus()->sync($request->menu_ids);
            }

            // Update add-ons if provided
            if ($request->has('addon_ids')) {
                $eventPackage->eventAddOns()->sync($request->addon_ids);
            }

            DB::commit();

            // Load relationships for response
            $eventPackage->load(['eventSpace', 'eventMenus', 'eventAddOns']);

            return response()->json([
                'success' => true,
                'message' => 'Event package updated successfully',
                'data' => $eventPackage
            ], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Event package not found'
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to update event package',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified event package
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $eventPackage = EventPackage::findOrFail($id);

            DB::beginTransaction();

            // Detach relationships
            $eventPackage->eventMenus()->detach();
            $eventPackage->eventAddOns()->detach();

            // Delete the package
            $eventPackage->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Event package deleted successfully'
            ], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Event package not found'
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete event package',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get event package statistics
     */
    public function statistics(): JsonResponse
    {
        try {
            $stats = [
                'total_packages' => EventPackage::count(),
                'average_price' => EventPackage::avg('price'),
                'total_capacity' => EventPackage::sum('pax'),
                'price_range' => [
                    'min' => EventPackage::min('price'),
                    'max' => EventPackage::max('price')
                ],
                'pax_range' => [
                    'min' => EventPackage::min('pax'),
                    'max' => EventPackage::max('pax')
                ]
            ];

            return response()->json([
                'success' => true,
                'message' => 'Event package statistics retrieved successfully',
                'data' => $stats
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve statistics',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Bulk operations for event packages
     */
    public function bulkOperations(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'action' => 'required|in:delete,update,activate,deactivate',
                'package_ids' => 'required|array',
                'package_ids.*' => 'uuid|exists:event_packages,id',
                'update_data' => 'required_if:action,update|array',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            DB::beginTransaction();

            $action = $request->action;
            $packageIds = $request->package_ids;
            $affected = 0;

            switch ($action) {
                case 'delete':
                    $affected = EventPackage::whereIn('id', $packageIds)->delete();
                    break;

                case 'update':
                    if ($request->has('update_data')) {
                        $affected = EventPackage::whereIn('id', $packageIds)
                            ->update($request->update_data);
                    }
                    break;

                case 'activate':
                    $affected = EventPackage::whereIn('id', $packageIds)
                        ->update(['is_active' => true]);
                    break;

                case 'deactivate':
                    $affected = EventPackage::whereIn('id', $packageIds)
                        ->update(['is_active' => false]);
                    break;
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => "Bulk {$action} completed successfully",
                'data' => [
                    'affected_count' => $affected,
                    'total_requested' => count($packageIds)
                ]
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to perform bulk operations',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
