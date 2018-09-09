/* ==============================================================================
// Calender JScript File
//===============================================================================
// Creation Date	    :	11-Aug-2008
// Created By		    :	Tata Consultancy Services
// Description		    :	This file is used as a separate javascript file to 
//                          maintain the javascript functions for Calender control
//===============================================================================
// Last Modified Date	:	
// Description		    :	
// Version No           :   1.0
===============================================================================*/
    
    
    //Check date function
    function CheckDate(dateClientId)
    {
        try
        {
            if(CutSpace(document.getElementById(dateClientId).value)!="" && document.getElementById(dateClientId).readOnly==false)
            {
                if(!IsValidDate(document.getElementById(dateClientId).value))
                {
                    document.getElementById(dateClientId).focus();
                }
            }
        }
        catch(ex)
        {
            alert(ex.description);
        }        
    }

    //Function to display calendar
    function ShowCalendar(dateClientId)
    {
        try
        {   
    	    var date                                    = new Date();
	        document.getElementById(dateClientId).value = window.showModalDialog('../Calendar/Calendar.htm',date, 'dialogLeft:250px;dialogTop:250px;dialogHeight:220px;dialogWidth:265px;center:No;help:No;scroll:No;resizable:No;status:No;');
	        return false;
	    }
        catch(ex)
        {
            alert(ex.description);
            return false;
        }
    }
    
    //function to disable calendar
    function DisableButton(Calendar)
    {
        try
        {
            document.getElementById(Calendar).disabled      = true;
            document.getElementById(Calendar).style.cursor  = "auto";
        }
        catch(ex)
        {
            alert(ex.description);
        }    
    }
    
    //function to enable calendar
    function EnableButton(Calendar)
    {
        try
        {
            document.getElementById(Calendar).disabled      = false;
            document.getElementById(Calendar).style.cursor  = "hand";
        }
        catch(ex)
        {
            alert(ex.description);
        }    
    }
    
    //Validation on TextBox
    function IsValidDate(dateString)
    {
        var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{4})$/; // requires 4 digit year
        var matchArray = dateString.match(datePat); // is the format ok?
        try
        {
	        if (matchArray == null)
	        { 
		        alert("Please enter a valid date in MM/DD/YYYY format")
		        return false;
	        }
	        month   = matchArray[1]; // parse date into variables
	        day     = matchArray[3];
	        year    = matchArray[4];
	        if (month < 1 || month > 12)
	        { 
		        alert("Please enter a valid date in MM/DD/YYYY format");
		        return false;
	        }
	        if (day < 1 || day > 31)
	        {
		        alert("Please enter a valid date in MM/DD/YYYY format");
		        return false;
	        }
	        if ((month==2 || month==4 || month==6 || month==9 || month==11) && day==31)
	        {
		        alert("Month '"+month+"' does not have 31 days")
		        return false;
	        }
	        if (month == 2) 
	        { // check for february 29th
		        var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
		        if (day>29 || (day==29 && !isleap))
		        {
			        alert("February " + year + " does not have " + day + " days");
			        return false;
		        }
	        }
	        return true;
	    }
	    catch(ex)
        {
            alert(ex.description);
            return false;
        }
    }
    
    function CutSpace(str)
    {
        try
        {
	        var i,j,str1;
	        i   = 0;
	        j   = str.length-1;
	        str = str.split("");
	        while(i < str.length)
	        {
		        if(str[i]==" ")
		        {
			        str[i] = ""
		        }
		        else
		        {
			        break;
		        }
		        i++;
	        }
	        while(j > 0)
	        {
		        if(str[j]== " ")
		        {
			        str[j]=""
		        }
		        else
		        {
			        break;
		        }
		        j--;
	        }
	        str1 = str.join("");
	        return str1;
	    }
	    catch(ex)
	    {
	        alert(ex.description);
	    }
    }