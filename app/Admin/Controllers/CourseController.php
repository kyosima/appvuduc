<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CoursePrice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('admin.course.index', compact('courses'));
    }

    public function create()
    {
        $products = Product::all();

        return view('admin.course.create', compact('products'));
    }

    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            try {
                $slug = Str::slug($request->course_title, '-');

                $course = Course::create([
                    'name' => $request->course_title,
                    'slug' => $slug,
                    'feature_img' => $request->feature_img,
                    'status' => $request->course_status,
                    'long_desc' => $request->description,
                ]);

                $coursePrice = new CoursePrice();
                $coursePrice->vpoint_retail = $request->course_vpoint;
                $coursePrice->vpoint_2_star = $request->course_discount_2;
                $coursePrice->vpoint_1_star = $request->course_discount_1;
                $coursePrice->vpoint_platinum = $request->course_discount_platinum;
                $coursePrice->vpoint_diamond = $request->course_discount_diamond;
                $coursePrice->vpoint_gold = $request->course_discount_gold;
                $coursePrice->vpoint_silver = $request->course_discount_silver;
                $coursePrice->vpoint_member = $request->course_discount_member;

                $course->coursePrice()->save($coursePrice);

                DB::table('course_product')->insert([
                    'course_id' => $course->id,
                    'product_id' => $request->course_product,
                ]);

                return redirect()->route('course.edit', $course->id)->with('success', 'Tạo khóa học thành công');
            } catch (\Throwable $th) {
                throw new \Exception('Đã có lỗi xảy ra vui lòng thử lại');
                return redirect()->back()->withErrors(['error' => $th->getMessage()]);
            }
        });
    }

    public function edit(Request $request, $id)
    {
        $products = Product::all();
        $course = Course::find($id);
        $arr = [];
        foreach ($course->products as $item) {
            array_push($arr, $item->id);
        }
        return view('admin.course.edit', compact('products', 'course', 'arr'));
    }

    public function update(Request $request, $id)
    {
        return DB::transaction(function () use ($request, $id) {
            try {
                $slug = Str::slug($request->course_title, '-');

                Course::where('id', $id)->update([
                    'name' => $request->course_title,
                    'slug' => $slug,
                    'feature_img' => $request->feature_img,
                    'status' => $request->course_status,
                    'long_desc' => $request->description,
                ]);

                CoursePrice::where('id_ofcourse', $id)->update([
                    'vpoint_retail' => $request->course_vpoint,
                    'vpoint_2_star' => $request->course_discount_2,
                    'vpoint_1_star' => $request->course_discount_1,
                    'vpoint_platinum' => $request->course_discount_platinum,
                    'vpoint_diamond' => $request->course_discount_diamond,
                    'vpoint_gold' => $request->course_discount_gold,
                    'vpoint_silver' => $request->course_discount_silver,
                    'vpoint_member' => $request->course_discount_member,
                ]);

                DB::table('course_product')->where('course_id', $id)->update([
                    'course_id' => $id,
                    'product_id' => $request->course_product,
                ]);
                return redirect()->route('course.edit', $id)->with('success', 'Cập nhật khóa học thành công');
            } catch (\Throwable $th) {
                throw new \Exception('Đã có lỗi xảy ra vui lòng thử lại');
                return redirect()->back()->withErrors(['error' => $th->getMessage()]);
            }
        });
    }

    public function destroy($id)
    {   
        $course = Course::find($id);
        if($course != null) {
            Course::destroy($id);
            $message = 'Đã xóa '. $course->name .' thành công';
            return redirect()->route('course.index')->with('success', $message);
        } else {
            return redirect()->back()->withErrors(['error' => "Đã có lỗi xảy ra"]);
        }
    }
}
