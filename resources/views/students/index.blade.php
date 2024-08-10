@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- <h1 class="text-center mb-4">Student List</h1> -->

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4 row">
            <div class="col">
                <span style="font-weight: bold;">Student List</span>
            </div>
            <div class="col-auto">
                <form action="{{ route('students.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control mr-2" placeholder="Search students or teachers">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <div class="col-auto">
                <a href="{{ route('students.create') }}" class="btn btn-success">
                    Add New Student
                </a>
            </div>
        </div>


        <div class="table-responsive">
            <table id="students-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Class Teacher</th>
                        <th>Admission Date</th>
                        <th>Yearly Fees</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $counter = 1; @endphp
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->student_name }}</td>
                            <td>{{ $student->class }}</td>
                            <td>{{ $student->teacher->name }}</td>
                            <td>{{ $student->admission_date }}</td>
                            <td>{{ $student->yearly_fees }}</td>
                            <td>
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 mb-4">
            {{ $students->links() }}
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"></script>
<script>
    $(document).ready(function() {
        $('#students-table').DataTable({
            paging: true,
            searching: true,
            info: true,
            lengthChange: false,
        });
    });
</script>
@endsection