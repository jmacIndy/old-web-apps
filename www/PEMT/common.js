//This function is used to open a calendar     
function DatePickerOpener(txtBox)
{
    try
    {
	    var date = new Date();
	    document.getElementById(txtBox).value = window.showModalDialog('../Calendar/Calendar.htm',date, 'dialogLeft:250px;dialogTop:250px;dialogHeight:220px;dialogWidth:265px;center:No;help:No;scroll:No;resizable:No;status:No;');
    }
    catch(ex)
    {
        alert(ex.description);
        return false;
    }
}   
