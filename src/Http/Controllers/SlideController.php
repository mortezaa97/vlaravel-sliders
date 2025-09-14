<?php

declare(strict_types=1);

namespace Mortezaa97\Sliders\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Mortezaa97\Sliders\Models\Slide;

class SlideController extends Controller
{
    public function index(Request $request)
    {
        $items = new Slide;

        if ($request->conditions) {
            $items = $items->where(json_decode($request->conditions, true));
        }

        if ($request->with) {
            $items = $items->with($request->with);
        }

        return $request->noPaginate ? $items->get() : $items->paginate();
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Slide::class);
        try {
            DB::beginTransaction();
            $item = new Slide;
            $data = $request->only($item->fillable);
            $data['create_by'] = Auth::user()->id;
            $slide = $item->create($data);
            if (isset($request->status)) {
                $slide->setStatus($request->status);
            }
            DB::commit();
        } catch (Exception $exception) {
            return response($exception->getMessage());
        }

        return $slide;
    }

    public function show(Slide $slide)
    {
        return Slide::where('id', $slide->id)->with([
            'video', 'image', 'slider',
        ])->first();
    }

    public function update(Request $request, Slide $slide)
    {
        Gate::authorize('update', $slide);
        try {
            DB::beginTransaction();
            $data = $request->only($slide->fillable);
            $data['update_by'] = Auth::user()->id;
            $slide->update($data);
            if (isset($request->status)) {
                $slide->setStatus($request->status);
            }
            DB::commit();
        } catch (Exception $exception) {
            return response($exception->getMessage());
        }

        return $slide;
    }

    public function destroy(Slide $slide)
    {
        Gate::authorize('delete', $slide);
        try {
            DB::beginTransaction();
            $slide->delete();
            DB::commit();
        } catch (Exception $exception) {
            return response($exception->getMessage());
        }

        return response('با موفقیت حذف شد');
    }
}
