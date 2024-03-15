<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #e9e9e9;
    }

    tr:hover {
        background-color: #ddd;
    }

</style>
<table class="table table-hover table-bordered 
table-stripped" id="example2">
    <table class="table	table-hover	table-bordered table-stripped" id="example2">
        <thead>
            <tr>
            <tr class="table-danger">
            <tr>
                            <th>nonota_beli</th>
                            <th>tgl_beli</th>
                            <th>total_beli</th>
                            <th>id_distributor</th>
                            <th>id_user</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembelian as $key => $pembelian)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$pembelian->nonota_beli}}</td>
                            <td>{{$pembelian->tgl_beli}}</td>
                            <td>{{$pembelian->total_beli}}</td>
                            <td>{{$pembelian->id_distributor}}</td>
                            <td>{{$pembelian->fuser->name}}</td>
                            
            @endforeach
        </tbody>
    </table>
