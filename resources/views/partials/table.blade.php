<div class="table-responsive">
    <table class="table table-responsive">
    <thead style="background: #d3d3d3">
    <tr>
        <th>Ref</th>
        <th>Email</th>
        <th>Amount</th>
        <th>Bank</th>
        <th>Acct no</th>
        <th>Date</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody id="tableBody">
    @foreach($data as $item)
        <tr>
            <td>{{$item->ref}}</td>
            <td>{{$item->email}}</td>
            <td>{{number_format($item->amount, 2)}}</td>
            <td>{{$item->bank}}</td>
            <td>{{$item->account_no}}</td>
            <td>{{$item->created_at}}</td>
            <td>
                @if($item->status == 0)
                    <a href="#" class="btn btn-warning">Pending</a>
                @elseif($item->status == 3)
                    <a href="#" class="btn btn-danger">Rejected</a>
                @elseif($item->status == 4)
                    <a href="#" class="btn btn-success">User Funded</a>
                @elseif($item->status == 5)
                    <a href="#" class="btn btn-danger">Processing</a>
                @else
                    <a href="#" class="btn btn-success">Completed</a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
<div>
    {{$data->links()}}
</div>
