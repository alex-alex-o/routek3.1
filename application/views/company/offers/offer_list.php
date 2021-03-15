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
                    Предложения
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                  <table id = "na_datatable" class = "table table-striped table-hover dataTable">
                    <thead>
                      <tr>
                        <th>Название</th>
                        <th>Дата</th>
                        <th>Статус</th>
                        <th>Время выполнения в днях</th>
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

 <!-- Jquery DataTable Plugin Js -->
<script src="<?= base_url()?>public/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= base_url()?>public/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

<script type="text/javascript">
  //---------------------------------------------------
    var table = $('#na_datatable').DataTable( {
        "processing": false,
        "serverSide": true,
        "searching": false,
        "ajax": "<?=base_url('company/offers/datatable_json/' . $this->session->userdata('company_id'))?>",
        "order": [[1,'desc']],
        "columnDefs": [
            { "targets": 0, "name": "name",       'searchable':true,  'orderable' : true},
            { "targets": 1, "name": "created_at", 'searchable':false, 'orderable' : true},
            { "targets": 2, "name": "status",     'searchable':false, 'orderable' : true},
            { "targets": 3, "name": "lead_time",  'searchable':false, 'orderable' : true},
            { "targets": 4, "name": "Action",     'searchable':false, 'orderable' : false, 'width' : '100px'}
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
    $("#orders").addClass('active');
 </script>
  

  

