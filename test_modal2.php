<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body>
<ul>
    <li class="span4 device">
        <div class="inner">        
            <div class="control-group">
                <label class="control-label">Device Type</label>
                <span class="field">Really cool device</span>
            </div>
            <div class="control-group hide">
                <label class="control-label">Device ID</label>
                <span class="field">123456</span>
            </div>
        </div>
        <a class="details" data-toggle="modal" >View details</a>
    </li>
</ul>
</body>

<script>
var customModal = $('<div class="custom-modal modal" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div></div>');

$('.details').click(function(){
    $('body').append(customModal);
    $(this).find($('h3')).clone().appendTo('.custom-modal .modal-header');
    $(this).find('.device-product, .device-details').clone().appendTo('.custom-modal .modal-body');
    $('.custom-modal .hide').show();
    $('.custom-modal').modal();
  
    $('.custom-modal').on('hidden', function(){
        console.log("hidden");
        $('.custom-modal').remove();
    });
});

</script>