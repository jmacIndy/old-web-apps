<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
   <head>
      <title>EM Trending System - Incident Trend</title>
      <link rel="stylesheet" type="text/css" href="StyleSheet.css" />
      <script language="javascript" src="common.js"></script>
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
                  <b>INCIDENT</b></td>
          </tr>
         <tr style="font-size: 12pt; font-family: Times New Roman">
            <td style="width: 100%">
               <hr style="color:#CC0000; height: 1px; width:100%; size:1" />                        
            </td>
         </tr>
      </table>
<?php
echo "Incident Trend Details";

$trendID = $_GET['trendId'];
$db = mysql_connect("localhost", "root", "nascar02");
mysql_select_db("PEM_OWNER",$db);
$result = mysql_query("SELECT * FROM PEM_TREND WHERE PEM_TREND_ID = ".$trendID, $db);
$myrow = mysql_fetch_array($result);
mysql_close($db);
?>
      <table width="98%">
          <tr>
              <td align="left" style="height: 22px">
                  <label id="TrendsLabel" class="TextLabel">
                       Trend ID</label>
              </td>
              <td align="left" style="height: 22px">
                  <?php echo $myrow['PEM_TREND_ID']; ?>
              </td>
              <td align="left" style="height: 22px">
                  <label id="Label1" class="TextLabel">
                      Acceptance Criteria</label>
              </td>
              <td align="left" style="height: 22px">
                  <?php echo $myrow['TREND_ACPTNC_CRITERIA_DESC']; ?>
              </td>
         </tr>
         <tr>
              <td align="left" style="height: 22px">
                  <label id="Label1" class="TextLabel">
                      Grade</label>
              </td>
              <td align="left" style="height: 22px">
                  <?php echo $myrow['TREND_GRD_CD']; ?>
              </td>
              <td align="left" style="height: 22px">
                  <label id="Label1" class="TextLabel">
                      Max No. of CFUs Allowed</label>
              </td>
              <td align="left" style="height: 22px">
                  <?php printf("%d", $myrow['TREND_LMT_NBR']); ?>
              </td>
          </tr>
         <tr>
              <td align="left" style="height: 22px">
                  <label id="Label1" class="TextLabel">
                      Site Identifier</label>
              </td>
              <td align="left" style="height: 22px">
                  <?php echo $myrow['TREND_SITE_DESC']; ?>
              </td>
              <td align="left" style="height: 22px">
                  <label id="Label1" class="TextLabel">
                      No. of CFUs Identified</label>
              </td>
              <td align="left" style="height: 22px">
                  <?php printf("%d", $myrow['TREND_VAL_CNT']); ?>
              </td>
          </tr>
         <tr>
              <td align="left" style="height: 22px">
                  <label id="Label1" class="TextLabel">
                      Site Type</label>
              </td>
              <td align="left" style="height: 22px">
                  <?php echo $myrow['TREND_SITE_TYP_DESC']; ?>
              </td>
              <td align="left" style="height: 22px">
                  <label id="Label1" class="TextLabel">
                      Trend Status</label>
              </td>
              <td align="left" style="height: 22px">
                 <?php
                 if ( is_null($myrow['TREND_ACKNOW_BY_USR_ID']))
                 {
                    echo "Open";
                 }
                 else
                 {
                    echo "Closed";
                 }
                 ?>
              </td>
          </tr>
       </table>
      <table border="0" width="100%" style="text-align: left;">
         <tr style="font-size: 12pt; font-family: Times New Roman">
            <td style="width: 100%">
               <hr style="color:#CC0000; height: 1px; width:100%; size:1" />                        
            </td>
         </tr>
      </table>
<?php
echo "Reading Details";

$db1 = mysql_connect("localhost", "root", "nascar02") or die("connect error");
mysql_select_db("PEM_OWNER",$db1);
$result1 = mysql_query("SELECT * FROM PEM_RDNG WHERE PEM_TREND_ID=".$trendID, $db1);
echo("<table border=1>\n");
echo("<tr><td>Sample ID</td><td>Sample Date</td><td>Sample Type</td><td>Reading ID</td><td>Reading Date</td></tr>\n");
$myrow1 = mysql_fetch_array($result1);
printf("<tr><td>%d</td><td>", $myrow1['RDNG_SMPL_ID']);
print date('Y-m-d h:i:s A', strtotime($myrow1['RDNG_SMPL_DT']));
printf("</td><td>%s</td><td>%d</td><td>", $myrow1['RDNG_SMPL_TYP_CD'], $myrow1['RDNG_READ_ID']);
print date('Y-m-d h:i:s A', strtotime($myrow1['RDNG_READ_DT']));
echo("</td></tr>\n");
echo("</table>\n");
mysql_close($db1);
?>
   </body>
</html>
