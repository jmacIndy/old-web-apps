<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
<title>EM Trending System - Trend Details</title>
<link rel="stylesheet" type="text/css" href="include/StyleSheet.css" />
</head>
<body>
<?php

include 'include/header.php';
include 'database.php';

include 'Trend.php';

?>

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
         <input id="SiteNameTextBox" class="TextValue" width="200px" size=32>
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
                  <input id="RoomTextBox" class="TextValue" width="200px" size=32>
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
              </td>
              <td style="width: 12%" align="left">
                  <label id="ToDateLabel" class="TextLabel">
                      To Date</label><label class="MandatoryField">*</label>
              </td>
              <td style="width: 14%" align="left">
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

$trends = array();

$db = new Database();  
$db->connect();  
$db->select('PEM_TREND', '*', , 'PEM_TREND_ID DESC');  
$res = $db->getResult();  

foreach ($res as $row)
{
   $tempTrend = new Trend();

   $tempTrend->setId($row['PEM_TREND_ID']);
   $tempTrend->setType($row['TREND_RCRD_TYP_CD'],
      $row['TREND_GENERE_DESC']);
   $tempTrend->setAcceptCriteria($row['TREND_ACPTNC_CRITERIA_DESC']);
   $tempTrend->setSiteId($row['TREND_SITE_DESC']);

   /* php doesnt understand mysql datetime - convert first */
   $tempDate = date('Y-m-d H:i:s', $row['TREND_CRTD_DT']);
   $tempTrend->setCreateDate($tempDate);
   $tempDate = date('Y-m-d H:i:s', $row['TREND_SMPL_DT']);
   $tempTrend->setSampleDate($tempDate);

   $tempTrend->setStatus($row['TREND_ACKNOW_BY_USR_ID']);
   $tempTrend->setGramPosNeg($row['TREND_GRAM_POS_NEG_CD']);

   $trends[] = $tempTrend;
}

$db->disconnect();

echo '<table border="1">';
echo '<tr>';
echo '<th>Trend Id</th>';
echo '<th>Record Type</th>';
echo '<th>Acceptance Criteria</th>';
echo '<th>Site Identifier</th>';
echo '<th>Sample Date</th>';
echo '<th>Created Date</th>';
echo '<th>Trend Status</th>';
echo '<th>Gram +/-</th>';
echo '</tr>';

foreach ($trends as $t)
{
   echo '<tr>';
   printf('<td><a href="incidentTrend.php?trendId='.$t->getId().'">%d</a></td>', $t->getId());
   printf('<td>%s</td>', $t->getType());
   printf('<td>%s</td>', $t->getAcceptCriteria());
   printf('<td>%s</td>', $t->getSiteId());
   echo '<td>blank</td>';
   echo '<td>blank</td>';
   printf('<td>%s</td>', $t->getStatus());
   printf('<td>%s</td>', $t->getGramPosNeg());
   echo '</tr>';
}

echo '</table>'

?>

</body>
</html>
