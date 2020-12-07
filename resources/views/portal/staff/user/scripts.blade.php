<script type="text/javascript">
  $(function () {
  
    var table = $('.user-list-yajradt').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('user.list') }}",
      columns: [
        {
          data: 'name', 
          name: 'name'
        },
        {
          data: 'email', 
          name: 'email'
        },
        {
          data: 'status', 
          name: 'status'
        },
        {
          data: 'action', 
          name: 'action', 
          orderable: false, 
          searchable: false
        },
      ],
      coloumnDefs:[
        {
          targets: 2,
          render: function ( data, type, row ) {
            var color = 'success';
            var status = 'Active';
            if (data == 1) {
              color = 'success';
              status = 'Active';
            } 
            else {
              color = 'danger';
              status = 'Inactive';
            }
            return '<span class="text-'+color+'">'+status+'</span>';
          }
        }
      ]
    });
  });
</script>