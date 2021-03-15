<!-- JQuery DataTable Css -->
<link href="<?= base_url()?>public/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet" />  
<!-- Bootstrap Select Css -->
<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    Мои заказы
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                  <table id = "na_datatable" class = "table table-striped table-hover dataTable">
                    <thead>
                      <tr>
                        <th>Название</th>
                        <th>Количество</th>
                        <th>Статус</th>
                        <th>Время выполнения в днях</th>
                        <th>Дата запроса</th>
                        <th>Дата начала работ</th>
                        <th width="200" class="text-right">Действия</th>
                      </tr>
                    </thead>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Exportable Table -->

<!-- Modal -->
<div id="confirm-delete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Удаление</h4>
            </div>
            <div class="modal-body">
                <p>Вы действительно хотите удалить заказ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <a class="btn btn-danger btn-ok">Удалить</a>
            </div>
        </div>
    </div>
</div>

 <!-- Jquery DataTable Plugin Js -->
<script src="<?= base_url()?>public/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= base_url()?>public/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

<script type="text/javascript">
  //---------------------------------------------------
    var table = $('#na_datatable').DataTable( {
        "processing": false,
        "serverSide": true,
        "searching": false,
        "ajax": "<?=base_url('company/orders/datatable_json/' . $status_id)?>",
        "order": [[3,'desc']],
        "columnDefs": [
            { "targets": 0, "name": "name",       'searchable':true,  'orderable' : true},
            { "targets": 1, "name": "quantity",   'searchable':true,  'orderable' : true},
            { "targets": 2, "name": "status",     'searchable':true,  'orderable' : true},
            { "targets": 3, "name": "lead_time",  'searchable':true,  'orderable' : true},
            { "targets": 4, "name": "created_at", 'searchable':false, 'orderable' : true},
            { "targets": 5, "name": "started_at", 'searchable':false, 'orderable' : true},
            { "targets": 6, "name": "Action",     'searchable':false, 'orderable' : false, 'width' : '100px'}
        ],
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Russian.json"
        }                
    });
</script>
  
<!-- Autosize Plugin Js -->
<script src="<?= base_url() ?>public/plugins/autosize/autosize.js"></script> 

<!-- Custom Js -->
 <script src="<?= base_url()?>public/js/pages/tables/jquery-datatable.js"></script>
 
 <script>
    //Textare auto growth
    autosize($('textarea.auto-growth'));

    //Delete Dialogue
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    
    $("#orders").addClass('active');
 </script>
  

  

