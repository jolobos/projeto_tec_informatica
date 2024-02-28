jQuery.extend( jQuery.fn.pbTable.defaults, {
  selectable: true,
  sortable: true,
  highlight: false,
  toolbar:{
    enabled:true,
    idToAppend:'undefined',
    filterBox:true,
    selectedClass:'selected',
    tags:[{display:'Todos', toSearch:''}],
    buttons:['view', 'edit', 'delete', 'new', 'print', 'receipt']
  },
  pagination: {
    enabled: false,
    pageSize: 10
  }
}); //$.fn.pbTable.defaults