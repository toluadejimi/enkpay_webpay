<table class="table table-responsive mt-3">
    <thead style="background: #d3d3d3">
    <tr>
        <th>Email</th>
        <th>Amount</th>
        <th>Bank</th>
        <th>Date</th>
        <th>Status</th>
    </tr>
    </thead >
    <tbody id="tableBody">
    @foreach($data as $item)
        <tr>
            <td>{{$item->email}}</td>
            <td>{{number_format($item->amount, 2)}}</td>
            <td>{{$item->bank}}</td>
            <td>{{$item->created_at}}</td>
            <td>
                @if($item->status == 0)
                    <a href="#" class="btn btn-warning">Pending</a>
                @elseif($item->status == 3)
                    <a href="#" class="btn btn-danger">Rejected</a>
                @elseif($item->status == 4)
                    <a href="#" class="btn btn-success">User Funded</a>
                @elseif($item->status == 5)
                    <a href="#" class="btn btn-danger">Ticket on Hold</a>
                @else
                    <a href="#" class="btn btn-success">Completed</a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div>
    {{$data->links()}}
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const tableContainer = document.getElementById('tableContainer');

        function fetchResults(query = '', page = 1) {
            fetch(`{{ url('/search-data') }}?query=${query}&page=${page}`)
                .then(response => response.text())
                .then(html => {
                    tableContainer.innerHTML = html;
                });
        }

        searchInput.addEventListener('input', function() {
            const query = searchInput.value;
            fetchResults(query);
        });

        document.addEventListener('click', function(event) {
            if (event.target.matches('.pagination a')) {
                event.preventDefault();
                const url = new URL(event.target.href);
                const query = searchInput.value;
                const page = url.searchParams.get('page');
                fetchResults(query, page);
            }
        });
    });
</script>
