<?php
#-------------------------------------------------------------------------
#
# Author: Ben Malen, <ben@conceptfactory.com.au>
# Co-Maintainer: Simon Radford, <simon@conceptfactory.com.au>
# Web: www.conceptfactory.com.au
#
#-------------------------------------------------------------------------
#
# Maintainer since 2011: Jonathan Schmid, <hi@jonathanschmid.de>
# Web: www.jonathanschmid.de
#
#-------------------------------------------------------------------------
# ListIt2 become EasyList due to the departure of the wackos in summer 2014.
#
# Jean-Christophe ghio <jcg@interphacepro.com>
#
#-------------------------------------------------------------------------
# EasyList is a CMS Made Simple module that enables the web developer to create
# multiple lists throughout a site. It can be duplicated and given friendly
# names for easier client maintenance.
#
#-------------------------------------------------------------------------

if (!is_object(cmsms())) exit;

#---------------------
# Database tables
#---------------------

$dict = NewDataDictionary($db);

$sqlarray = $dict->DropTableSQL(cms_db_prefix() . 'module_easylist_instances');
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->DropTableSQL(cms_db_prefix() . 'module_easylist_fielddefs');
$dict->ExecuteSQLArray($sqlarray);

#---------------------
# Events
#---------------------

$this->RemoveEventHandler('Core', 'ContentPostCompile');
$this->RemoveEventHandler('Core', 'ModuleInstalled');
$this->RemoveEventHandler('Core', 'ModuleUninstalled');
$this->RemoveEventHandler('Core', 'ModuleUpgraded');

#---------------------
# Preferences
#---------------------

$this->RemovePreference();

#---------------------
# Smarty plugins
#---------------------

$this->RemoveSmartyPlugin();