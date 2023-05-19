<script>
    (function(document) {
            'use strict';
            var TableFilter = (function(Arr) {

                    var _input;

                    function _onInputEvent(e) {
                            _input = e.target;
                            var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
                            Arr.forEach.call(tables, function(table) {
                                    Arr.forEach.call(table.tBodies, function(tbody) {
                                            Arr.forEach.call(tbody.rows, _filter);
                                            
                                    });
                            });
                    }

                    function _filter(row) {
                            var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
                            row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
                            
                    }

                    return {
                            init: function() {
                                    var inputs = document.getElementsByClassName('table-filter');
                                    Arr.forEach.call(inputs, function(input) {
                                            input.oninput = _onInputEvent;
                                            
                                    });
                            }
                    };                  
            })(Array.prototype);

            document.addEventListener('readystatechange', function() {
                    if (document.readyState === 'complete') {
                            TableFilter.init();    
                    } 
            });
    })(document);
</script>
<style>
::-ms-clear {
  display: none;
}

.form-control-clear {
  z-index: 10;
  pointer-events: auto;
  cursor: pointer;
}
</style>
<script>
    $('.has-clear input[type="text"]').on('input propertychange', function() {
      var $this = $(this);
      var visible = Boolean($this.val());
      $this.siblings('.form-control-clear').toggleClass('hidden', !visible);
    }).trigger('propertychange');

    $('.form-control-clear').click(function() {
        $(this).siblings('input[type="text"]').val('')
        .trigger('propertychange').focus();
        location.reload();
    });
</script>
