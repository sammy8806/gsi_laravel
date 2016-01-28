<?php

/**
 * Created by PhpStorm.
 * User: Steven
 * Date: 21.07.14
 * Time: 20:04
 */
class ConfigNode {

   /**
    * @var ConfigNode $__parent
    */
   private $__parent;

   /**
    * @var ConfigNode[] $__childs
    */
   private $__childs;

   /**
    * @var ConfigNode[] $__siblings
    */
   private $__siblings;

   /**
    * @var Integer $nodeType
    */
   private $nodeType;

   const TYPE_CONFIG = 1;
   const TYPE_CATEGORY = 2;
   const TYPE_SECTION = 3;
   const TYPE_ENTRY = 4;

   //region Attributes
   /**
    * @var mixed[] $__attributes
    */
   private $__attributes;

   public function setAttribute($name, $value) {
      $this->__attributes[$name] = $value;
   }

   public function getAttribute($name, $default = null) {
      return !array_key_exists($name, $this->__attributes) ? $default : $this->__attributes[$name];
   }

   public function getAttributes() {
      return $this->__attributes;
   }
   //endregion

   //region Node Functions
   /**
    * @param ConfigNode $parent
    * @param $nodeType
    *
    * @throws InvalidArgumentException
    */
   public function __construct(&$parent = null, $nodeType) {
      if ($parent === null || !($parent instanceof ConfigNode)) {
         return;
      }

      if (!in_array($nodeType, [1, 2, 3, 4])) {
         throw new InvalidArgumentException();
      }
      $this->nodeType = $nodeType;

      $parent->addChild($this);
   }

   public function addChild(ConfigNode &$child) {
      $this->__childs[] = $child;

      return $child;
   }

   /**
    * @return ConfigNode[]
    */
   public function &getChilds() {
      return $this->__childs;
   }

   /**
    * @param ConfigNode $sibling
    *
    * @return \ConfigNode
    */
   public function addSibling(ConfigNode &$sibling) {
      return $this->getParent()->addChild($sibling);
   }

   /**
    * @return ConfigNode
    */
   private function &getParent() {
      return $this->__parent;
   }
   //endregion

}