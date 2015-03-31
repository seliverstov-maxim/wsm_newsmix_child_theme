<?php
   function hex2rgb($hex) {
      $hex = str_replace("#", "", $hex);

      if(strlen($hex) == 3) {
         $r = hexdec(substr($hex,0,1).substr($hex,0,1));
         $g = hexdec(substr($hex,1,1).substr($hex,1,1));
         $b = hexdec(substr($hex,2,1).substr($hex,2,1));
      } else {
         $r = hexdec(substr($hex,0,2));
         $g = hexdec(substr($hex,2,2));
         $b = hexdec(substr($hex,4,2));
      }
      $rgb = array($r, $g, $b);
      return $rgb;
   }


   class jQueryNodeMover {

      function deatach($selector) {
         $this->res_selector = $selector;
         return $this;
      }

      function append($selector) {
         $this->dest_selector = $selector;
         return $this;
      }

      function apply($print = false) {
         $script = "
            <script>
               jQuery(function() {
                  var el = jQuery('" . $this->res_selector . "').detach();
                  jQuery('" . $this->dest_selector . "').append(el);
               });
            </script>
         ";
         if ($print) { echo $script; return true; }
         return $script;
      }
   }