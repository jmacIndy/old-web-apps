<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
   <head>
      <title>EM Trending System - Trend Details</title>
      <link rel="stylesheet" type="text/css" href="StyleSheet.css" />
   </head>
   <body>
      <table cellpadding="0" cellspacing="0" width="100%">
         <tr>
            <td style="width: 100%">
               <table cellpadding="0" cellspacing="0" style="width: 100%">
                  <tr>
                     <td align="left" style="width: 20%" valign="top">
                        <table cellpadding="0" cellspacing="0" style="width: 100%">
                           <tr>
                              <td style="width: 5%" align="left" valign="top">
                                 <img src="/Images/internal.gif" height="70px" Width="15px" />
                              </td>
                              <td align="left" style="width: 95%">
                                 <img src="/Images/Reporting.jpg" height="70px" Width="180px" />
                              </td>
                           </tr>
                        </table>
                     </td>
                     <td style="width: 60%">
                        <table width="100%" cellpadding="0" cellspacing="0">
                           <tr>
                              <td align="center">
                                 <span style="font-size: larger; color: black;"><span style="font-family: Verdana"><strong>
                                 <span style="font-size: 12pt">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                        &nbsp; &nbsp;&nbsp;</span></strong></span></span>
                              </td>
                           </tr>
                           <tr>
                              <td align="center" style="height: 30px">
                                                <strong><span style="font-family: Verdana">Indianapolis Parenteral EM Trending System</span></strong>
                              </td>
                           </tr>
                           <tr>
                              <td align="left" style="color: black; height: 19px;">
                                 <strong><span style="font-size: 8pt"></span></strong><span style="font-family: Verdana">
                                                    &nbsp; </span>
                              </td>
                           </tr>
                        </table>
                     </td>
                     <td align="right" style="width: 20%; font-size: 12pt; font-family: Times New Roman;"
                                    valign="top">
                        <img src="/Images/lilly-c.gif" />
                     </td>
                  </tr>
               </table>
               <?php
               /* insert welcome user here */
               ?>
            </td>
         </tr>
         <tr style="font-size: 12pt; font-family: Times New Roman">
            <td style="width: 100%">
               <hr style="color:#CC0000; height: 1px; width:100%; size:1" />                        
            </td>
         </tr>
         <tr style="width: 100%">
            <td style="width: 100%">
               <div id="navmenu">
                  <ul>
                     <li><a href="index.php">Home</a></li>
                     <li><a href="trends.php">Trends</a></li>
                     <li><a href="wordpress/travel/">Reports</a></li>
                     <li><a href="http://www.wordpress.org">User Master</a>
                     <li><a href="http://www.wordpress.org">Error Log</a>
                     <li><a href="http://www.wordpress.org">Audit Trail</a>
                     <li><a href="http://www.wordpress.org">Logout</a>
                     <li><a href="http://www.wordpress.org">Help</a>
                  </ul>
               </div>
            </td>
         </tr>
         <tr style="font-size: 12pt; font-family: Times New Roman">
            <td style="width: 100%">
               <hr style="color:#CC0000; height: 1px; width:100%; size:1" />                        
            </td>
         </tr>
      </table>
      <table border="0" width="100%" style="text-align: left;">
          <tr>
              <td align="center" style="font-family: Verdana">
                  <b>TREND DETAILS</b></td>
          </tr>
      </table>
      <table width="98%">
          <tr>
              <td align="left" style="height: 22px">
                  <label id="TrendsLabel" class="TextLabel">
                       Record Type</label>
              </td>
              <td align="left" style="height: 22px">
                  <select id="TrendsDropDown" class="TextLeft" width="192px">
                     <option>--All--</option>
                     <option>% Positive</option>
                     <option>Incident</option>
                     <option>Exceeded Alert</option>
                     <option>Microflora</option>
                  </select>
              </td>
              <td align="left" style="height: 22px">
                  <label id="Label1" class="TextLabel">
                      Site Name</label>
              </td>
              <td align="left" style="height: 22px">
                  <input id="SiteNameTextBox" class="TextValue" width="200px" size=100>
                  </input>
              </td>
          </tr>
          <tr>
              <td align="left">
                  <label id="ManufacturingAreaLabel" class="TextLabel">
                      Manufacturing Area</label>
              </td>
              <td align="left" style="height: 22px; font-size: 12pt; font-family: Times New Roman;">
                  <select id="ManufacturingAreaDropDown" class="TextValue" width="192px">
                     <option>--All--</option>
                     <option>DC Filling</option>
                     <option>DC Manufacturing</option>
                     <option>DHC Freeze Dry/Filling</option>
                     <option>DHC Manufacturing</option>
                  </select>
              </td>
              <td align="left">
                  <label id="RoomLabel" class="TextLabel">
                      Room Name</label>
              </td>
              <td align="left">
                  <input id="RoomTextBox" class="TextValue" width="200px" size=100>
                  </input>
              </td>
          </tr>
          <tr>    
              <td align="left">
                  <label id="ShiftLabel" class="TextLabel">
                      Shift Number</label>
              </td>
              <td align="left">
                  <select id="ShiftDropDown" class="TextValue" width="192px">
                     <option>--All--</option>
                     <option>1</option>
                     <option>2</option>
                     <option>3</option>
                  </select>
              </td>
              <td align="left">
                  <label id="DisposedFlagLabel" class="TextLabel">
                      Trend Status</label>
              </td>
              <td align="left">
                  <select id="StatusDropDown" class="TextValue" width="118px">
                     <option>--Both--</option>
                     <option>Open</option>
                     <option>Closed</option>
                  </select>
              </td>
          </tr>
          <tr>
              <td style="width: 12%" align="left">
                  <label id="FromDateLabel" class="TextLabel">
                      From Date</label><label class="MandatoryField">*</label>
              </td>
              <td style="width: 14%" align="left">
                  <input id="FromDateTextBox" class="DateField" width="200px" size=10>
                  <a id="FromDateImage" onclick="javascript:DatePickerOpener('<%=FromDateTextBox.ClientID%>');"
                      href="#">
                      <img src="../Images/Calender.BMP" alt="calendar" class="Calendar" /></a>
                  <input type="hidden" id="hiddenFromDate" runat="server" style="width: 15px" />
              </td>
              <td style="width: 12%" align="left">
                  <label id="ToDateLabel" class="TextLabel">
                      To Date</label><label class="MandatoryField">*</label>
              </td>
              <td style="width: 14%" align="left">
                  <input id="ToDateTextBox" class="DateField" width="200px" size=10>
                  <a id="ToDateImage" onclick="javascript:DatePickerOpener('<%=ToDateTextBox.ClientID%>');"
                      href="#">
                      <img src="../Images/Calender.BMP" alt="calendar" class="Calendar" /></a>
                  <input type="hidden" id="hiddenToDate" runat="server" style="width: 15px" />
              </td>
          </tr>
          <tr>
              <td align="left" style="height: 22px">
                  <label id="TrendIdLabel" class="TextLabel">
                      Trend ID</label>
              </td>
              <td align="left" style="height: 22px">
                  <input id="TrendIdTextBox" class="TextValue" width="190px" size=32>
              </td>
              <td align="left" style="height: 22px">
                  <label id="CriteriaLabel" class="TextLabel">
                      Acceptance Criteria</label>
              </td>
              <td align="left" style="height: 22px">
                  <select id="CriteriaDropDown" class="TextValue" width="228px">
                     <option>--All--</option>
                     <option>Incident Limit</option>
                     <option>Manufacturing Area / Rolling Time Period</option>
                     <option>Manufacturing Area/Fixed sample count</option>
                     <option>Room / Rolling Time Period</option>
                     <option>Site / Rolling Time Period</option>
                  </select>
             </td>
          </tr>
          <tr>
              <td align="center" colspan="4" style="height: 24px">
                  <input type="button" id="SearchButton" value="Search" class="button" OnClick="SearchButton_Click">
                  <input type="button" id="ResetButton" value="Reset" class="button" OnClick="ResetButton_Click">
          </tr>
      </table>
<?php
$db = mysql_connect("localhost", "pem_procs", "nascar02");
mysql_select_db("pem_owner", $db);
$dgnew C_DataGrid("SELECT * FROM pem_trend", "pem_trend_id", "pem_trend");
$dg -> display();
   </body>
</html>