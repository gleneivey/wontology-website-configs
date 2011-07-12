-- MySQL dump 10.11
--
-- Host: localhost    Database: glenivey_WmStaging
-- ------------------------------------------------------
-- Server version	5.0.91-community-cll

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `connections`
--

DROP TABLE IF EXISTS `connections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `connections` (
  `id` int(11) NOT NULL auto_increment,
  `subject_id` int(11) default NULL,
  `predicate_id` int(11) default NULL,
  `obj_id` int(11) default NULL,
  `connection_desc_id` int(11) default NULL,
  `flags` int(11) NOT NULL default '0',
  `kind_of_obj` varchar(255) collate utf8_unicode_ci default NULL,
  `scalar_obj` varchar(255) collate utf8_unicode_ci default NULL,
  `created_at` datetime default NULL,
  `updated_at` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1063114885 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `connections`
--

LOCK TABLES `connections` WRITE;
/*!40000 ALTER TABLE `connections` DISABLE KEYS */;
INSERT INTO `connections` VALUES (45994025,359743202,155164888,284206594,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(83949326,323976943,687547366,158346908,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(88386627,44154988,687547366,323976943,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(110719423,609252888,155164888,44154988,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(132592281,884444489,155164888,624297138,NULL,1,NULL,NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(161610743,277608277,687547366,718785934,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(164832713,170790109,155164888,925945740,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(218993263,158346908,687547366,158346908,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(253555694,877427059,155164888,44154988,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(258431553,63834298,155164888,624297138,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(308096110,192356560,155164888,842601740,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(345093710,624297138,155164888,925945740,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(358481237,624297138,359743202,170790109,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(387966546,884444489,359743202,251292288,NULL,1,NULL,NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(423737133,842601740,687547366,323976943,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(461441918,170790109,359743202,624297138,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(480995121,284206594,687547366,323976943,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(513220443,367434275,107063597,998030268,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(548140935,920944228,687547366,718785934,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(602006685,609252888,155164888,44154988,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(606066822,192356560,359743202,278775490,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(652485539,1070477057,687547366,718785934,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(659127293,155164888,155164888,925945740,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(667401418,831010095,687547366,718785934,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(690676888,718785934,687547366,158346908,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(700613898,129261093,155164888,44154988,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(701070178,107063597,155164888,44154988,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(720062034,251292288,359743202,884444489,NULL,1,NULL,NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(735929554,411949856,155164888,284206594,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(785770558,757645616,687547366,277608277,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(812341197,322325962,325310915,920944228,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(816898459,286380372,155164888,44154988,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(835792708,687547366,155164888,925945740,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(886222893,325310915,155164888,925945740,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(917625668,987768420,325310915,459541461,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(925675352,278775490,155164888,842601740,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(932025368,278775490,359743202,192356560,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(936860063,925945740,687547366,323976943,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(978208876,367434275,155164888,44154988,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(990895711,928916349,325310915,459541461,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(994891202,887063214,325310915,459541461,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(1057032013,998030268,325310915,920944228,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(1063114884,251292288,155164888,170790109,NULL,1,'item',NULL,'2011-03-27 05:39:32','2011-03-27 05:39:32');
/*!40000 ALTER TABLE `connections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci default NULL,
  `title` varchar(255) collate utf8_unicode_ci default NULL,
  `description` text collate utf8_unicode_ci,
  `sti_type` varchar(255) collate utf8_unicode_ci default NULL,
  `flags` int(11) NOT NULL default '0',
  `created_at` datetime default NULL,
  `updated_at` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1070477058 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (37803096,'class_item_type_is','Class\' Item-Type is (defining relationship)','This property is used to constrain the type (Individual, Category, or Property) of item that is acceptable for items that are to be instances of the subject class.  For example, assume that ChemicalElement is a class.  It is reasonable to require that all items which are instances of this class be \"individual\" items, since it is unlikely to be appropriate to represent a single chemical element as a \"category\".  (What would go into the \"Carbon category\"?)  So, the connection \"ChemicalElement class_item_type_is Value_ItemType_Individual\" states that all of ChemicalElement\' instance items are (must be Individual-type items).  With this connection in place, the system will only permit the creation of new items whose class is ChemicalElement to be of type Individual.  (Note that this connection is provided to be an aid to data entry and editing, and is not enforced as a completely strict prohibition.  For example, since class membership is represented by the presence of \"is_instance_of\" connections, like \"Carbon is_instance_of ChemicalElement\", explicitly editing the connection that establishes an items class after that item is created will circumvent the class/type checking and can produce a wontology containing contradictory statements&mdash<em>caveat editor</em>.)','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(44154988,'value_relationship','Value Relationship (root relationship type)','This is a root element in the system\'s internal schema.  All relationship (property) classes are children of one of three root relationship types, including this one.','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(63834298,'one_of','One Of (basic relationship)','A relationship of this type between two items is hierarchical. This relationship states that the subject (left-hand side) of the relationship (\"A\" in the relationship \"A is One-Of B\", and like \"macintosh\" in \"macintosh is One-Of computer\") is assumed to be more specific or more narrow than the object of the relationship (\"B\" and \"computer\").  When showing a graph of connections between items, the system will attempt to indicate \'One-Of\' relationships as primarily vertical, with the object-item drawn nearer \"the root\" of the graph and the subject-item toward \"the leaves\".\n\'One Of\' is most appropriate for showing relationships between an individual and a category.  Relationships between two categories are better indicated with \'Child Of\', as in \"computer is Child-Of electronics\" (assuming, of course, that they\'re both categories).\n\'One Of\' is itself a child of \'Child Of\'.  And \'Child Of\' is the opposite of \'Parent Of\', and finally \'Contains\' is a child of \'Parent Of\'.  So, it might be possible to infer that \'One Of\' and \'Contains\' are approximate opposites of each other.  However, making a \'One Of\' relationship between two items will not automatically cause the symmetric \'Contains\' relationship to be created/assumed.','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(107063597,'has_scalar_object','Has a Scalar Value for its Object (defining relationship)','This property is used to define/restrict the permissable choices for the object item of another property.  For example, consider the statement \"myRelationship has_scalar_object String_Value\". This connection says that the objects of all connections that use \"myRelationship\" as their predicate should be scalar (single valued) constants, and that String_Value is the acceptable type for those constants.\nWhen a connection like this is present, and a new connection is being defined, once a has_scalar_object-property is selected, only a text-entry box (and not an item selector) will be displayed, and its content will be limited to what is acceptable for the type specified by the has_scalar_object relationship\'s own object item.','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(129261093,'has_item_object','Has an Item for its Object (defining relationship)','This property is used to define/restrict the set of permissable choices for the object item of another property.  For example, consider the statement \"myRelationship has_item_object \'True\'\".  This connection says that the objects of all connections that use \"myRelationship\" as their predicate should be an item and not a constant.  (Note that the existence of a connection using has_item_object is the important thing, and that the object of such a connection is ignored.  By convention it is filled in with the String \"True\", but this is not checked by the system.)\nWhen a connection like this is present, and a new connection is being defined, once a has_item_object-property is selected, only an item selector (and not a text-entry box) will be displayed.','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(155164888,'sub_property_of','SubProperty Of (basic relationship type)','This relationship is used to relate two other relationships to each other.  The statement \"A is a SubProperty-Of B\" says that the relationship A makes a more specific, narrow claim about items it relates than the relationship B does.  However, if the system has special behavior or handling for relationship B, the \'SubProperty Of\' statement allows it to determine it should apply that special behavior to A as well.\nFor example, when drawing relationship graphs, the system attempts to draw all instances of \'Symmetric Relationship\" in a primarily horizontal way.  There is a built-in statement that \"Peer-Of is a SubProperty-Of Symmetric-Relationship\", which causes \'Peer Of\' relationships to be (preferentially) drawn horizontally, as will be any other types of relationships that are added to a sontology.','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(158346908,'Item_Class','Class of all Items (foundation class)','This category item is the foundation for the hierarchy of items that represent \"classes.\"  A class is an item, some of whose properties make statements about the other items that are \"instances\" of that class.  Wontologies can be constructed where the membership (set of instances) in the class are determined by rules that compare against the other items in the wontology, but more commonly, a class\' instance items are explicitly identified using the is_instance_of property.\nAny item that is to represent a \"class\" (a category whose child items are \"instances\" of the class) should be identified as a child of this category or one of this category\'s other children using the sub_class_of property.','CategoryItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(170790109,'parent_of','Parent Of (basic relationship)','This is the fundamental type of hierarchical relationship.  This relationship states that the subject (left-hand side) of the relationship (\"A\" in the relationship \"A is the Parent-Of B\", and like \"vehicle\" in \"vehicle is Parent-Of spacecraft\") is a super-set of the object of the relationship (\"B\" and \"spacecraft\").  When showing a graph of connections between items, the system will attempt to indicate \'Parent Of\' relationships as primarily vertical, with the subject-item drawn nearer \"the root\" of the graph and the object-item toward \"the leaves\".\n\'Parent Of\' is typically appropriate for relationships between two categories or between two individuals.  To indicate that a category contains an individual, the more specific \'Contains\' can be used.\n\'Parent Of\' is the opposite of \'Child Of\'.  Creating a relationship that states one category is \'Parent Of\' another is exactly the same as creating a \'Child Of\' relationship with the subject and object reversed, and the system will list the relationship between then using both relationship names (which name is given priority depends on which item is more central to the display).','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(192356560,'successor_of','Successor Of (basic relationship)','This relationship states that the subject (left-hand side) of the relationship (\"N\" in the relationship \"N is a Successor-Of M\") follows the object in some type of ordered sequence or collection.\n\n\n    # relationships grounding those above','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(251292288,'contains','Contains (basic relationship)','A relationship of this type between two items is hierarchical. This relationship states that the subject (left-hand side) of the relationship (\"A\" in the relationship \"A Contains B\", and like \"spacecraft\" in \"spacecraft Contains apollo\") is more general or broad than the object of the relationship (\"B\" and \"apollo\"). When showing a graph of connections between items, the system will attempt to indicate \'Contains\' relationships as primarily vertical, with the subject-item drawn nearer \"the root\" of the graph and the object-item toward \"the leaves\".\n\'Contains\' is most appropriate for showing relationships between a category and an individual.  Relationships between two categories are better indicated with \'Parent Of\', as in \"vehicle Contains spacecraft\" (assuming, of course, that both are categories).\n\'Contains\' is the opposite of \'Part Of\'.  Creating a relationship that states one category \'Contains\' another is exactly the same as creating a \'Part Of\' relationship with the subject and object revesed, and the system will list the relationship between them using both relationship names.\'Contains\' is also Child-Of \'Parent Of\'.  (And \'Parent Of\' and \'Child Of\' are opposites of each other, and \'One Of\' is another child of \'Child Of\'.  But this does not make \'Contains\' and \'Child Of\' opposites of each other.)','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(277608277,'String_Value','String (scalar type)','This item represents a particular type of constant value that can be used as the object of connections.  For example, in the statement \"SallySinger sFavoriteColorIs \'Blue\'\", \"Blue\" is a String-type constant value.  The system doesn\'t perform any checks on the content of String constant aside from ensuring that they are not empty and not too long.','CategoryItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(278775490,'predecessor_of','Predecessor Of (basic relationship)','This relationship states that the subject (left-hand side) of the relationship (\"A\" in the relationship \"A is a Predecessor-Of B\") precedes the object in some type of ordered sequence or collection.','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(284206594,'symmetric_relationship','Symmetric Relationship (root relationship type)','This is a root element in the system\'s internal schema.  All relationship (property) classes are children of one of three root relationship types, including this one.','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(286380372,'property_object_is','Property\'s Object is a (defining relationship)','This property is used to define/restrict the set of items that are permissable choices for the object item of another property.  For example, consider the statement \"myRelationship property_object_is myClass\".  The existence of this connection restricts the content of the wontology so that the only acceptable subject items for relationships where \"myRelationship\" is the predicate are items that are instances of \"myClass\" or of one of myClass\' child sub-classes.','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(322325962,'Value_False','False (a constant value)','This item is provide for use as the object of connections that express a simple (true or false) fact.  For example, \"Value_False\" is the object of the connection \"BettyTheCat hasFleas Value_False\".','IndividualItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(323976943,'Property_Item','Class of all Property Items (foundation class)','This category item is the base of the hierarchy of items that are properties.  It is a class, and is therefore identified as such by the connection \"Property_Item is_instance_of Item_Class\".  The absolute requirement to identify items as being \"property type\" (as opposed to individual or category) is to specify that when they are created.  However, most properties will also be identified as such by the existence of either the connection \"[property] sub_property_of [another property]\" or \"[property] is_instance_of [another property class]\".  In the second of these connection forms \"another property class\" will be either Property_Item or one of its children.','CategoryItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(325310915,'is_instance_of','Is an Instance Of (basic relationship type)','This relationship is used to connect one item with a second item representing the class of which the first item is a member.  For example, the connection \"QueenMary is_instance_of Ships\" states that the Queen Mary is a ship, and allows the system to apply all of the rules that pertain to instances of \"Ships\" to the \"QueenMary\" item, and allows the \"QueenMary\" item to be referenced from contexts that require a member of \"Ships\".\n\n\n    # fundamental property classes; the root of the property universe','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(359743202,'inverse_relationship','Inverse Relationship (basic relationship type)','This relationship is used to characterize how two other relationships relate to each other.  This relationship is used to denote that two other relationships are symmetric and inseparable opposites of each other.  For example, \"Child-Of has Inverse-Relationship to Parent-Of\".  The system will interpret any two relationships linked by \'Inverse Relationship\' (or by a non-built in relationship that is marked as a \'SubProperty Of\' \'Inverse Relationship\') as being identical antonyms of each other.  Any time one relationship is created, the system will automatically infer, create, and show the matching opposite (inverse) relationship\'s name.','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(367434275,'max_uses_per_item','Maximum Number of Uses Per Item is (defining relationship)','This property is used to define/restrict how connections using a particular predicate item can be made.  The subject of connections using max_uses_per_item must be a property item, and the object must be an integer constant.  For example, if a wontology contains the connection \"myProperty max_uses_per_item 7\", it will prevent users from creating more than seven connections using \"myProperty\" as predicate with the same subject item.  Connections using this property affect the count (cardinality) of the specified relationship\'s subject items only, and does not place restrictions on the number of times an item can be referenced as the object of connections.','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(411949856,'peer_of','Peer Of (basic relationship)','A relationship of this type between two items indicates a relationship between equals.  This would be appropriate, for example, as a description of the \"synonym\" relationship that might occur between the entries for two words in a thesaurus. The system makes two assumptions about individuals that have a Peer-Of relationship to each other.  First, the relationship is assumed to be bidirectional.  Saying that \"A is a Peer-Of B\" implies that \"B is a Peer-Of A\", and it doesn\'t matter which of the two \"directions\" is used when the relationship is first created.  Second, when showing the graph of relationships between individuals, the system will attempt to indicate Peer-Of relationships as primarily horizontal.','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(459541461,'ItemType_Item','Group of items representing possible Item Types (foundation class)','This category item is part of the representation of the system\'s basic classification scheme for items (Category, Individual, Property) within the database of connections and items itself. Having items representing the available Item Types allows connections to be created that make statements about the types of items that are acceptable as members of a class.','CategoryItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(609252888,'applies_to_class','Applies to the Class (defining relationship)','This property is used to provide hints about the connections a user will likely create to go with items that are instances of a particular class.  For example, a wontology that is intended to contain a number of items that represent people, might contain a category item named \"Person\" to represent the class of all the individual person items.  Given that class, the connection \"birthDate applies_to_class Person\" makes the statement that it is likely (not mandatory) that each item which is_instance_of Person will have at least one connection using the property \"birthDate\" as a predicate.  The system uses this information to automatically create, each time a user makes a new instance item, a list of connections (with empty object item references) for the user to fill in.','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(624297138,'child_of','Child Of (basic relationship)','This is the fundamental type of hierarchical relationship.  This relationship states that the subject (left-hand side) of the relationship (\"A\" in the relationship \"A is a Child-Of B\", and like \"spacecraft\" in \"spacecraft is Child-Of vehicle\") is a subset of the object of the relationship (\"B\" and \"vehicle\").  When showing a graph of connections between items, the system will attempt to indicate \'Child Of\' relationships as primarily vertical, with the object-item drawn nearer \"the root\" of the graph and the subject-item toward \"the leaves\".\n\'Child Of\' is typically appropriate for relationships between two categories or between two individuals.  To indicate that an individual is contained by a category, the more specific \'One Of\' can be used.\n\'Child Of\' is the opposite of \'Parent Of\'.  Creating a relationship that states one category is \'Child Of\' another is exactly the same as creating a \'Parent Of\' relationship with the subject and object reversed, and the system will list the relationship between then using both relationship names (which name is given priority depends on which item is more central to the display).','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(687547366,'sub_class_of','SubClass Of (basic relationship type)','This relationship is used to connect two items, both representing classes, indicating that the subject item is a sub-class of the object item.  For example, the connection \"Ships is a SubClass-Of Vehicles\" links the two class items, and makes the statement that \"Ships\" are a more specific kind of \"Vehicles\".  Once this connection is established, the system will behave as if everything that is true about \"Vehicles\" is also true for \"Ships\" (although not vice-versa).  For example, if another property is defined such that its object items are required to be instances of the \"Vehicles\" class, then having this connection allows instances of \"Ships\" to be used as well.  But, another property whose objects are required to be \"Ships\" is not affected, and other \"Vehicles\" still cannot be used.','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(689675372,'Date_Value','A Date (optionally with time, scalar type)','This item represents a particular date (and time).  It is a relatively free-form field, allowingg a mix of letters, numbers, and punctuation to allow easily human-readable dates to be entered.  The date/time can be as accurate as the information you have allows.  Depending on the context, it could be as general as a single year or even a century, or it could be a date and time down to the second:  \"March 24, 2010 at 12:15:22pm (Pacific)\". But it cannot be ambiguous.  For example, if you spell out the month when entering a birth date, then both \"4 January 1955\" and \"Jan 4, 1955\" are acceptable.  However, you should not type something like \"1/4/55\" because of both the month/day ambiguity (difference between U.S. and European common ordering) and because of the century ambiguity (probably 1955, but what if it was 1855?).','CategoryItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(718785934,'Type_Item','Class of all Scalar Types (foundation class)','This category item is the class that contains all items representing possible \"types\" for the values of property objects that are constants (rather than other items).  For example, in the connection \"SallySinger sBirthdayIs \'March 10, 1977\'\", the object of the \"sBirthdayIs\" property is a date constant.  The type for data constants is represented in the system by the item \"Date_Value\", which is one of the members of this class.  All of the constant types that the system is capable of handling are represented by members of \"Type_Item\".  (Note that, if the type of information you want to use as a constant object doesn\'t have a matching \"Type_Item\" member, you can use the generic \"String_Value\" type.)','CategoryItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(757645616,'URL_Value','Web Address (scalar type for URL strings)','This item represents a particular type of constant value that can be used as the object of connections.  For example, in the statement \"SallySinger webSiteIs \'http://sally-stringer.tld/\'\", the \"http...\" string is a Web Address-type constant value.  The system checks the address (URL) supplied for syntax, but does not currently test that the location referenced actually exists.  In addition to the web address itself, a URL_Value-constant can contain additional text, separated from the web address by spaces.  (Note that URLs are not allowed to contain spaces, so there is no opportunity for confusion.)  When creating pages that use a URL_Value to create links, if additional text is present in the URL_Value, it will be used for the text of the link instead of the actual web address.','CategoryItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(831010095,'Integer_Value','Integer (scalar type)','This item represents a particular type of consant value that can be used as the object of connections.  For example, in the statement \"SallySinger sTestScoreIs \'45\'\", \"45\" is an Integer-type constant.  The system will only allow the digits 0 through 9 (possibly with a leading minus sign, \'-\') to be entered for a connections constant object if it is marked as \"Integer_Value\".','CategoryItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(842601740,'ordered_relationship','Ordered Relationship (root relationship type)','This is a root element in the system\'s internal schema. Properties should be made sub_property_of  this property if they imply an order between their subject and object.  Among other things, this property allows the system to make UI decisions.','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(877427059,'property_subject_is','Property\'s Subject is a (defining relationship)','This property is used to define/restrict the set of items that are permissable choices for the subject item of another property. For example, consider the connection \"myRelationship property_subject_is MyClass\".  The existence of this connection restricts the content of the wontology so that the only acceptable subject items for relationships where \"myRelationship\" is the predicate are items that are instances of \"MyClass\" or of one of MyClass\' child sub-classes.\nWhen a property_subject_is relationship is created, it affects the options available for creating and editing connections--pages will be populated only with options consistent with the current state of the data.','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(884444489,'part_of','Part Of (basic relationship)','A relationship of this type between two items is hierarchical. This relationship states that the subject (left-hand side) of the relationship (\"A\" in the relationship \"A is Part-Of B\", and like \"SoftwareTesting\" in \"SoftwareTesting is Part-Of ComputerSoftware\" in a categorization of engineering disciplines) is assumed to be more specific/narrow than, and contained within, what corresponds to the object of the relationship (\"B\" and \"ComputerSoftware\"). When showing a graph of connections between items, the system will attempt to indicate \'Part-Of\' relationships as primarily vertical, with the object-item drawn nearer \"the root\" of the graph and the subject-item toward \"the leaves\".\n\'Part Of\' is most appropriate for showing relationships that would be indicated by complete inclusion when drawing a Ven Diagram. That is, if drawing a Ven Diagram of how categories relate to each other, the category corresponding to the subject item of this relationship would be drawn entirely within the category corresponding to the object item.  In this way, it is more restrictive than the \'One Of\' relationship, which indicates membership without implying complete overlap.\n\'Part Of\' is the opposite of \'Contains\'.  Creating a relationship that states one category is \'Part Of\' another is exactly the same as creating a \'Contains\' relationship with the subject and object reversed, and the system will list the relationship between them using both relationship names.  \'Part Of\' is itself a child of \'Child Of\'.  (And \'Child Of\' is the opposite of \'Parent Of\', and finally \'Contains\' is a child of \'Parent Of\'.)','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(887063214,'Value_ItemType_Individual','Item Type \'Individual\' (a constant value)','This item represents the \"Individual\" type of system items.  See the description of ItemType_Item.','IndividualItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(920944228,'Boolean_Value','Boolean (\'True\' or \'False\' scalar type)','This item represents a particular type of constant value that can be used as the object of connections.  For example, in the statement \"SallySinger paysTaxesOnTime-Is \'True\'\", \"true\" is the Boolean constant object of the connection.  Sometimes the value of a Boolean-type constant can be input by selecting a specific web-page control, and other types it has to be typed into a text-entry box.  When typed, only the words \"true\" or \"false\" should be used, although the capitalization (\"true\", \"True\", \"TRUE\") doesn\'t matter.  In addition, for connections that use properties that express a true/false state but whose objects are Items rather than constants, the system provides the built-in Items \"Value_True\" and \"Value_False\" that can be selected as a relationship\'s object.','CategoryItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(925945740,'hierarchical_relationship','Hierarchical Relationship (root relationship type)','This is a root element in the system\'s internal schema.  All relationship (property) classes are children of one of three root relationship types, including this one.','PropertyItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(928916349,'Value_ItemType_Property','Item Type \'Property\' (a constant value)','This item represents the \"Property\" type of system items.  See the description of ItemType_Item.','IndividualItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(987768420,'Value_ItemType_Category','Item Type \'Category\' (a constant value)','This item represents the \"Category\" type of system items.  See the description of ItemType_Item.','IndividualItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(998030268,'Value_True','True (a constant value)','This item is provide for use as the object of connections that express a simple (true or false) fact.  For example, \"Value_True\" is the object of the connection \"BillTheDog hasFleas Value_True\".','IndividualItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32'),(1070477057,'Number_Value','Any Number (scalar type)','This item represents a particular type of constant value that can be used as the object of connections.  For example, in the statement \"SallySinger sPercentileRankingInClassIs \'88.75\'\", the object value \"88.75\" is a number (in this point, a floating-point number with a fractional part).  The system will accept any number that can be typed, and attempts to parse number formats that include non-number characters (such as the \"e\" or \"E\" in scientific notation).  The system does not have a way to represent fractions, imaginary numbers, repeating digits, or significant figures.','CategoryItem',1,'2011-03-27 05:39:32','2011-03-27 05:39:32');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schema_migrations`
--

DROP TABLE IF EXISTS `schema_migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schema_migrations` (
  `version` varchar(255) collate utf8_unicode_ci NOT NULL,
  UNIQUE KEY `unique_schema_migrations` (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schema_migrations`
--

LOCK TABLES `schema_migrations` WRITE;
/*!40000 ALTER TABLE `schema_migrations` DISABLE KEYS */;
INSERT INTO `schema_migrations` VALUES ('20090312212805'),('20090406221320'),('20090411014503'),('20090415142152'),('20090518022918'),('20090529171442'),('20090529171508'),('20090605213800'),('20090605215028'),('20100315135952'),('20100321042343');
/*!40000 ALTER TABLE `schema_migrations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-07-12  1:37:13
