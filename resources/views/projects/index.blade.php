@extends('layouts.app')
@section('content')
@section('title','الصفحه الرئيسيه')
    <header class="d-flex justify-content-between align-items-center my-5" dir="rtl">
        <div class="h6 text-dark">
            <a href="/projects">المواد</a>
        </div>
        <div>
            <a href="/projects/create" class="btn btn-primary px-4" role="button">اضافة مادة جديدة</a>
        </div>
    </header>
    <section dir="rtl">
        <div class="row">
            @forelse ($projects as $project)
                <div class="col-4 mb-4">
                    <div class="card text-right" style="height:230px ">
                        <div class="card-body">
                            <div class="status">
                                @include('projects.partials.project_status',['status'=>$project->status])

                                <h5 class="font-weight-bold card-title">
                                    <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                                </h5>
                                <div class="card-text mt-4">
                                    {{ Str::limit($project->description, 150) }}
                                </div>

                            </div>
                        </div>
                        @include('projects.footer')
                    </div>
                </div>
                @empty
                    <div class="m-auto align-content-center text-center">
                        <p>لا يوجد اي مواد </p>
                        <div class="mt-5">
                            <a href="/projects/create" class="btn btn-primary btn-lg d-inline-flex align-items-center"
                                role="button">اضافه مادة جديدة</a>
                        </div>
                    </div>
                @endforelse
            </div>
        </section>
    @endsection
