@extends('doctor.dashboard.layout')
@section('title','Medico | Doctor Dashboard')
@section('dashboard-title','Medical Test Records')
@section('main-content')
<div>
    </div>
    <!--begin: Datatable -->
    <div class="adv-table" style="margin-top: 10px; margin-left:20px ; margin-right: 20px">
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Test Name</th>
                    <th>Report</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                ?>
                @foreach ($tests as $test)
                <tr>
                    <td><?= $i++ ?></td>
                    <td>{{$test->filename}}</td>
                    <td class="d-flex">
                  <embed src="{{URL::asset('storage/test_reports/'.$test->filename)}}" style="width: 1000px ;height:300px ">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!--end: Datatable -->
</div>


@endsection
@section('page-level-styles')
<style>
    .d-flex {
        display: flex;
    }

    .d-none {
        display: none !important;
    }

    .d-inline-block {
        display: inline-block !important;
    }
</style>
@endsection
@section('page-level-scripts')
<script src="{{ asset('assets/doctors/js/plugin/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script>
    var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }],
        "aaSorting": [
            [0, 'asc']
        ]
    });

    $('#upload-img-btn').click(function() {
        $('#card').toggleClass('d-inline-block').toggleClass('d-block');
    });

    $('#card').click(function() {
        $('#card').toggleClass('d-inline-block').toggleClass('d-block');
    });
    $('#card .wrapper').click(function(e) {
        e.stopPropagation();
    });
    $('#edit-card').click(function() {
        $('#edit-card').toggleClass('d-inline-block').toggleClass('d-block');
    });
    $('#edit-card .wrapper').click(function(e) {
        e.stopPropagation();
    });

    $('.edit-data').click(function() {
        var documentID = $(this).data('id');
        var name = $('#name-' + documentID).html();
        $('#edit-name').val(name);
        $('#edit-document-id').val(documentID);
        $('#edit-card').toggleClass('d-inline-block').toggleClass('d-block');
    });
</script>
@endsection