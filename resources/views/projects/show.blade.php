@extends('layouts.app')
@section('content')
@section('title','المهمه')
    <header class="d-flex justify-content-between align-items-center my-5" dir="rtl">
        <div class="h6 text-dark">
            <a href="/projects">المهام/{{ $project->title }}</a>
        </div>
        <div>
            <a href="/projects/{{ $project->id }}/edit" class="btn btn-primary px-4" role="button">تعديل المادة</a>
        </div>
    </header>
    <section class="row text-rigth" dir="rtl">
        <div class="col-lg-4">
            <div class="card text-right">
                <div class="card-body ">
                    <div class="status ">
                        @include('projects.partials.project_status',['status'=>$project->status])
                        <h5 class="font-weight-bold card-title">
                            <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                        </h5>
                        <div class="card-text mt-4">
                            {{ $project->description }}
                        </div>

                    </div>
                </div>
                @include('projects.footer')
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="font-weight-bold">تعديل حاله المادة</h5>
                    <form action="/projects/{{$project->id}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="custom-select" onchange="this.form.submit()">
                            {{-- <option value="2" {{ $project->status == 2 ? 'selected' : '' }}>قيد الانجاز</option>
                            <option value="0" {{ $project->status == 0 ? 'selected' : '' }}>مكتمل</option>
                            <option value="1" {{ $project->status == 1 ? 'selected' : '' }}>ملغي </option> --}}
                            @foreach(['complete'=>"مكتمل", 'cancelled'=>"ملغي",'incomplete'=>"غير مكتمل"] as $key=>$value)
                            <option value="{{$key}}" {{ $project->status == $key ? 'selected' : '' }}>{{$value}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8 ">
            @foreach ($project->tasks as $task)
                <div class="card d-flex flex-row mt-3 p-4 align-items-center">
                    <div class="{{ $task->done ? 'checked muted' : '' }}">
                        {{ $task->body }}
                    </div>
                    <div class="mr-auto">


                        <form action="/projects/{{ $project->id }}/tasks/{{ $task->id }}" method="post">
                            @csrf
                            @method('PATCH')

                            <input type="checkbox" name="done" class="form-control-input ml-1 "
                                {{ $task->done ? 'checked' : '' }} onchange="this.form.submit()">
                        </form>
                    </div>

                    <div class="d-flex align-items-center ">
                        <form action="/projects/{{ $task->project_id }}/tasks/{{ $task->id }}" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn-delete mt-4 " value="" >
                        </form>
                    </div>




                </div>
            @endforeach
            <div class="card mt-4">
                <form action="/projects/{{ $project->id }}/tasks" method="post" class="d-flex p-3">
                    @csrf
                    <input type="text" name="body" class="form-control p-2 ml-2 border-0" placeholder="اضف مهمه جديده">
                    <button type="submit" class="btn btn-primary">اضافه</button>
                </form>
            </div>
        </div>


    </section>
@endsection
