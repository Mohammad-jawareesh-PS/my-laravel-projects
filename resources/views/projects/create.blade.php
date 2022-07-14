@extends('layouts.app')
@section('title', 'انشاء مادة جديدة')
@section('content')
    <div class="row justify-content-center text-right">
        <div class="col-8">
            <div class="card p-4">
            <h3 class="text-center pb-5 font-weight-bold">مادة جديدة </h3>
            <form action="/projects" method="post" dir="rtl">
                @include('projects.form', ['project' => new App\Models\Project()])
                <div class="form-group d-flex flex-row-reverse">

                    <button type="submit" class="btn btn-primary mt-4">انشاء</button>
                    <a href="/projects" class="btn btn-light mt-4">الغاء</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
