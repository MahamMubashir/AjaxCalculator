
$('#submit').click( function()
{
    var sFormName = 'form[name=calculator] ';
    var oData =
    {
        op : $(sFormName + '#operation').val(),
        lho : $(sFormName + '#left_operand').val(),
        rho : $(sFormName + '#right_operand').val()
    };

    $.get('call.php', oData, function(oOutput)
    {
        $('#result').text( $(oOutput).find('result').text() );

    });
});