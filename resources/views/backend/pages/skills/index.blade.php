@extends('backend.layouts.app')

@section('page.name', 'Skills')

@section('page.content')
<div class="card">
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-sm-5">
                <h3>List</h3>
            </div>
            <div class="col-sm-7">
                <div class="text-sm-end">
                    <a href="javascript:void(0);" class="btn btn-danger mb-2 main_button"
                        onclick="smallModal('{{ url(route('manage.add_skills')) }}', 'Add Skills')"><i
                            class="mdi mdi-plus-circle"></i> Add Skills</a>
                    <a href="javascript:void(0);" class="btn btn-danger mb-2 ml-2 main_button"
                    onclick="smallModal('{{ url(route('manage.add_skills_import')) }}', 'Import Skills')"><i
                        class="mdi mdi-plus-circle"></i> Import Skills</a>
                </div>
            </div>
        </div>
        
        <div class="table-responsive">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <label for="rowsPerPage">Show</label>
                    <select id="rowsPerPage" onchange="updateRowsPerPage()" class="form-select form-select-sm">
                        <option value="10" {{ request()->get('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="25" {{ request()->get('per_page') == 100 ? 'selected' : '' }}>100</option>
                        <option value="50" {{ request()->get('per_page') == 200 ? 'selected' : '' }}>200</option>
                        <option value="100" {{ request()->get('per_page') == 300 ? 'selected' : '' }}>300</option>
                    </select>
                    <span>entries</span>
                </div>
            </div>
            <input type="text" id="customSearch" placeholder="Search skills..." class="form-control my-3">
            <table id="basic-datatable5" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = ($skills->currentPage() - 1) * $skills->perPage() + 1;
                    @endphp
                    @foreach ($skills as $status)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{ $status->name }}</td>
                        <td>
                            @if( $status->status == 1)
                                <span class="badge bg-success" title="Active">Active</span>
                            @else
                                <span class="badge bg-danger" title="Inactive">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="javascript:void(0);" class="btn btn-info text-white action-icon"
                                onclick="smallModal('{{ url(route('manage.edit_skills',['id' => $status->id])) }}', 'Edit Skills')">
                                <i class="mdi mdi-square-edit-outline" title="Edit"></i>
                            </a>
                            {{-- <a href="javascript:void(0);" class="btn btn-danger text-white action-icon"
                                onclick="deleteExperienceStatus('{{ url(route('manage.delete_skills', $status->id)) }}')">
                            <i class="mdi mdi-delete" title="Delete"></i>
                            </a> --}}
                            <a href="javascript:void(0);" class="btn btn-danger text-white action-icon" onclick="confirmModal('{{ url(route('manage.delete_skills', $status->id)) }}',
                            responseHandler)">
                                <i class="mdi mdi-delete" title="Delete"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $skills->appends(['per_page' => request()->get('per_page')])->links('pagination::newbootstrap-6') }}
            </div>
        </div>
    </div>
</div>
@endsection

@section("page.scripts")
<script>
    $(document).ready(function() {

        var urlParams = new URLSearchParams(window.location.search);
        var searchParam = urlParams.get('search');
        if (searchParam) {
            $('#customSearch').val(decodeURIComponent(searchParam));
        }

        var table = $('#basic-datatable5').DataTable({
            paging: false,
            info: false,
            dom: 'lrtip' // Correctly using 'dom' to hide default search
        });

        // Debounce function to add a delay
        function debounce(func, delay) {
            let timer;
            return function(...args) {
                clearTimeout(timer);
                timer = setTimeout(() => func.apply(this, args), delay);
            };
        }

        // Custom search input functionality with debounce
        $('#customSearch').on(
            'keyup',
            debounce(function() {
                var searchTerm = $(this).val();
                // Redirect with search term as GET parameter
                if (searchTerm.length >= 3) {
                    if (searchTerm.trim() !== '') {
                        window.location.href = `{{ url(route('manage.index_skills')) }}?search=${encodeURIComponent(searchTerm)}`;
                    } else {
                        window.location.href = window.location.pathname; // Clear search when input is empty
                    }
                } else if (searchTerm.trim() === '') {
                    // Clear search if input becomes empty
                    window.location.href = `{{ url(route('manage.index_skills')) }}`;
                }
            }, 500) // 500ms delay
        );
    });
</script>

<script>

function updateRowsPerPage() {
    var rowsPerPage = document.getElementById('rowsPerPage').value;
    var url = new URL(window.location.href);
    url.searchParams.set('per_page', rowsPerPage);
    window.location.href = url.href;
}

var responseHandler = function(response) {
    location.reload();
}
</script>
@endsection