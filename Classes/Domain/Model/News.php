<?php

namespace W4Services\W4Communitynet\Domain\Model;

/**
 * News
 */
class News extends \GeorgRinger\News\Domain\Model\News {

   /**
    * @var string
    */
   protected $eventType;

   /**
    * @return string
    */
   public function getEventType() {
      return $this->eventType;
   }

   /**
    * @param string $eventType
    */
   public function setEventType($eventType) {
      $this->eventType = $eventType;
   }
}
