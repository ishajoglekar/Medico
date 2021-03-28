@extends('user.dashboard.layout')
@section('title','Practo | User Dashboard')
@section('dashboard-title','My Medical Records')
@section('main-content')
    <div>
        <div class="" style="display: flex; flex-direction: row-reverse;">
            <div class="my-btn" style="margin-right: 20px" id="upload-img-btn">upload Documents</div>
        </div>
        <!--begin: Datatable -->
        <div class="adv-table" style="margin-top: 10px; margin-left:20px ; margin-right: 20px">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                    ?>
                    @foreach ($user->documents as $document)
                        <tr>
                            <td><?=$i++?></td>
                            <td id="name-{{$document->id}}">{{$document->name}}</td>
                            <td class="d-flex">
                                <a class='edit-data btn btn-primary btn-sm ml-2' data-id="{{$document->id}}" class='btn btn-primary btn-sm' style="margin-right: 3px" href="#!"><i class='fa fa-pencil'></i></a>
                                {{-- <a class='btn btn-primary btn-sm ml-2' style="margin-right: 3px" href="{{route('document.destroy',$document->id)}}"><i class='fa fa-trash'></i></a> --}}
                                <form action="{{route('document.destroyDocument',$document->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-primary btn-sm mr-2" type="submit" style="margin-right: 5px; margin-left: 5px;"><i class='fa fa-trash'></i></button>
                                </form>
                                <a class='btn btn-primary btn-sm ml-4' alt="Download" href="{{asset('storage/'.$document->location)}}" download><i class="fa fa-download" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!--end: Datatable -->
    </div>

    {{-- upload document modal --}}

    <div id="card" class="d-none">
        <div class="wrapper">
            <div class="card-head">
                Upload Document
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('document.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group col-md-12">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="name">Uplaod</label>
                                <input type="file" class="form-control" name="img" id="img" required>
                            </div>
                            <button class="my-btn col-md-2" type="submit">save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="edit-card" class="d-none">
        <div class="wrapper">
            <div class="card-head">
                Upload Document
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('document.updateData')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group col-md-12">
                                <input type="hidden" id="edit-document-id" name="document_id">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="edit-name" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="name">Uplaod</label>
                                <input type="file" class="form-control" name="img" id="edit-img">
                            </div>
                            <button class="my-btn col-md-2" type="submit">save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-level-styles')
    <style>
        .d-flex{
            display: flex;
        }
        .d-none{
            display: none !important;
        }
        .d-inline-block{
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

        $('#upload-img-btn').click(function(){
            $('#card').toggleClass('d-inline-block').toggleClass('d-block');
        });

        $('#card').click(function(){
            $('#card').toggleClass('d-inline-block').toggleClass('d-block');
        });
        $('#card .wrapper').click(function(e){
            e.stopPropagation();
        });
        $('#edit-card').click(function(){
            $('#edit-card').toggleClass('d-inline-block').toggleClass('d-block');
        });
        $('#edit-card .wrapper').click(function(e){
            e.stopPropagation();
        });

        $('.edit-data').click(function(){
            var documentID = $(this).data('id');
            var name = $('#name-'+documentID).html();
            $('#edit-name').val(name);
            $('#edit-document-id').val(documentID);
            $('#edit-card').toggleClass('d-inline-block').toggleClass('d-block');
        });
    </script>
@endsection

