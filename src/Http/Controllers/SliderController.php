<?php

declare(strict_types=1);

namespace Mortezaa97\Sliders\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Mortezaa97\Sliders\Models\Slider;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        $items = new Slider;

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
        Gate::authorize('create', Slider::class);
        try {
            DB::beginTransaction();
            $item = new Slider;
            $data = $request->only($item->fillable);
            $data['create_by'] = Auth::user()->id;
            $slider = $item->create($data);
            if (isset($request->status)) {
                $slider->setStatus($request->status);
            }
            DB::commit();
        } catch (Exception $exception) {
            return response($exception->getMessage());
        }

        return $slider;
    }

    public function show(Slider $slider)
    {
        return $slider;
    }

    public function update(Request $request, Slider $slider)
    {
        Gate::authorize('update', $slider);
        try {
            DB::beginTransaction();
            $data = $request->only($slider->fillable);
            $data['update_by'] = Auth::user()->id;
            $slider->update($data);
            if (isset($request->status)) {
                $slider->setStatus($request->status);
            }
            DB::commit();
        } catch (Exception $exception) {
            return response($exception->getMessage());
        }

        return $slider;
    }

    public function destroy(Slider $slider)
    {
        Gate::authorize('delete', $slider);
        try {
            DB::beginTransaction();
            $slider->delete();
            DB::commit();
        } catch (Exception $exception) {
            return response($exception->getMessage());
        }

        return response('با موفقیت حذف شد');
    }
}
