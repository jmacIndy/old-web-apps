<?php

class Trend
{
   private $trendId;
   private $trendType;
   private $acceptCriteria;
   private $siteId;
   private $sampleDate;
   private $createDate;
   private $status;
   private $gramPosNeg;

   public function __construct()
   {
      $this->status = 'Closed';
   }

   public function setId($in)
   {
      $this->trendId = $in;
   }

   public function setType($type, $genere)
   {
      if ( $type == 'Microflora')
      {
         $this->trendType = $type . ' (' . $genere . ')';
      }
      else
      {
         $this->trendType = $type;
      }
   }

   public function setAcceptCriteria($in)
   {
      $this->acceptCriteria = $in;
   }

   public function setSiteId($in)
   {
      $this->siteId = $in;
   }

   public function setSampleDate($in)
   {
      $this->sampleDate = $in;
   }

   public function setCreateDate($in)
   {
      $this->createDate = $in;
   }

   public function setStatus($ackBy)
   {
      if ( is_null($ackBy) )
      {
         $this->status = 'Open';
      }
      else
      {
         $this->status = 'Closed';
      }
   }

   public function setGramPosNeg($in)
   {
      $this->gramPosNeg = $in;
   }

   public function getId()
   {
      return $this->trendId;
   }

   public function getType()
   {
      return $this->trendType;
   }

   public function getAcceptCriteria()
   {
      return $this->acceptCriteria;
   }

   public function getSiteId()
   {
      return $this->siteId;
   }

   public function getSampleDate()
   {
      return $this->sampleDate;
   }

   public function getCreateDate()
   {
      return $this->createDate;
   }

   public function getStatus()
   {
      return $this->status;
   }

   public function getGramPosNeg()
   {
      return $this->gramPosNeg;
   }

}

?>
