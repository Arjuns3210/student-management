@extends('layouts.app')

@section('content')
    <div class="container my-5" style="max-width: 500px;margin: 0 auto;">
        <h1 class="text-center mb-4">Add New Student</h1>

        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="student_name" class="form-label">Student Name</label>
                <input type="text" id="student_name" name="student_name" class="form-control" value="{{ old('student_name') }}">
                @error('student_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <input type="text" id="class" name="class" class="form-control" value="{{ old('class') }}">
                @error('class')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="class_teacher_id" class="form-label">Class Teacher</label>
                <select id="class_teacher_id" name="class_teacher_id" class="form-select w-100">
                    <option value="">Select Teacher</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ old('class_teacher_id') == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->name }}
                        </option>
                    @endforeach
                </select>
                @error('class_teacher_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="admission_date" class="form-label">Admission Date</label>
                <input type="date" id="admission_date" name="admission_date" class="form-control" value="{{ old('admission_date') }}">
                @error('admission_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="yearly_fees" class="form-label">Yearly Fees</label>
                <input type="number" id="yearly_fees" name="yearly_fees" class="form-control" value="{{ old('yearly_fees') }}">
                @error('yearly_fees')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Add Student</button>
            </div>
        </form>
    </div>
@endsection
