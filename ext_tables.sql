#
# Table structure for table 'sys_template'
#
CREATE TABLE sys_template
(
    tx_w4communitynet_layout      varchar(255) DEFAULT 'w4_communitynet/Configuration/TypoScript/Layout1' NOT NULL,
    tx_w4communitynet_layoutcolor varchar(32) DEFAULT 'red' NOT NULL,
);

#
# Table structure for table 'pages'
#
CREATE TABLE pages
(
    tx_w4communitynet_menucolumns              smallint(1) DEFAULT '1' NOT NULL,
    tx_w4communitynet_logo                     int(11) unsigned DEFAULT '0' NOT NULL,
    tx_w4communitynet_logoname                 varchar(255) DEFAULT '' NOT NULL,
    tx_w4communitynet_logosubname              varchar(255) DEFAULT '' NOT NULL,
    tx_w4communitynet_quicklinks               varchar(255) DEFAULT '' NOT NULL,
    tx_w4communitynet_facebook                 varchar(255) DEFAULT '' NOT NULL,
    tx_w4communitynet_twitter                  varchar(255) DEFAULT '' NOT NULL,
    tx_w4communitynet_instagram                varchar(255) DEFAULT '' NOT NULL,
    tx_w4communitynet_linkedin                 varchar(255) DEFAULT '' NOT NULL,
    tx_w4communitynet_search                   int(11) unsigned DEFAULT '0' NOT NULL,
    tx_w4communitynet_footerlinks              varchar(255) DEFAULT '' NOT NULL,
    tx_w4communitynet_icon_class               varchar(255) DEFAULT '' NOT NULL,
    tx_w4communitynet_headerbg                 int(11) unsigned DEFAULT '0' NOT NULL,
    tx_w4communitynet_footerlogoenabled        smallint(1) unsigned DEFAULT '0' NOT NULL,
    tx_w4communitynet_searchboxintopbarenabled smallint(1) unsigned DEFAULT '0' NOT NULL,
    tx_w4communitynet_footerlayout             smallint(1) unsigned DEFAULT '1' NOT NULL,
    tx_w4communitynet_footerimages             int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content
(
    tx_w4communitynet_button          mediumtext,
    tx_w4communitynet_counters        mediumtext,
    tx_w4communitynet_iframe          mediumtext,
    tx_w4communitynet_visibility      smallint(2) unsigned DEFAULT '0' NOT NULL,
    tx_w4communitynet_boxtextheight   smallint(1) unsigned DEFAULT '0' NOT NULL,
    tx_w4communitynet_colorheader     smallint(1) unsigned DEFAULT '0' NOT NULL,
    tx_w4communitynet_underlineheader smallint(1) unsigned DEFAULT '0' NOT NULL,
    tx_w4communitynet_pheader         smallint(1) unsigned DEFAULT '0' NOT NULL,
    tx_w4communitynet_sliderheight    smallint(1) unsigned DEFAULT '0' NOT NULL,
    tx_w4communitynet_slidermask      smallint(1) unsigned DEFAULT '0' NOT NULL,
    tx_w4communitynet_citation        int(11) unsigned DEFAULT '0' NOT NULL,
    tx_w4communitynet_citationbg      int(11) unsigned DEFAULT '0' NOT NULL,
    tx_w4communitynet_citationtext    mediumtext,
    tx_w4communitynet_columnorder     smallint(1) DEFAULT '1' NOT NULL,
    tx_w4communitynet_citationcolor   varchar(255) DEFAULT '' NOT NULL,
);

#
# Table structure for table 'tx_w4communitynet_domain_model_counter'
#
CREATE TABLE tx_w4communitynet_domain_model_counter
(
    uid              int(11) NOT NULL auto_increment,
    pid              int(11) DEFAULT '0' NOT NULL,
    tstamp           int(11) DEFAULT '0' NOT NULL,
    crdate           int(11) DEFAULT '0' NOT NULL,
    cruser_id        int(11) DEFAULT '0' NOT NULL,
    t3ver_oid        int(11) DEFAULT '0' NOT NULL,
    t3ver_id         int(11) DEFAULT '0' NOT NULL,
    t3ver_wsid       int(11) DEFAULT '0' NOT NULL,
    t3ver_label      varchar(30) DEFAULT ''  NOT NULL,
    t3ver_state      smallint(4) DEFAULT '0' NOT NULL,
    t3ver_stage      smallint(4) DEFAULT '0' NOT NULL,
    t3ver_count      int(11) DEFAULT '0' NOT NULL,
    t3ver_tstamp     int(11) DEFAULT '0' NOT NULL,
    t3ver_move_id    int(11) DEFAULT '0' NOT NULL,
    t3_origuid       int(11) DEFAULT '0' NOT NULL,
    editlock         smallint(4) DEFAULT '0' NOT NULL,
    sys_language_uid int(11) DEFAULT '0' NOT NULL,
    l10n_parent      int(11) DEFAULT '0' NOT NULL,
    l10n_state       text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    l10n_diffsource  mediumtext,
    l10n_source      int(11) DEFAULT '0' NOT NULL,
    deleted          smallint(4) DEFAULT '0' NOT NULL,
    hidden           smallint(4) DEFAULT '0' NOT NULL,
    starttime        int(11) DEFAULT '0' NOT NULL,
    endtime          int(11) DEFAULT '0' NOT NULL,
    sorting          int(11) DEFAULT '0' NOT NULL,
    fe_group         varchar(100) DEFAULT ''  NOT NULL,
    name             varchar(255) DEFAULT ''  NOT NULL,
    starting_number  varchar(255) DEFAULT '0' NOT NULL,
    ending_number    varchar(255) DEFAULT '0' NOT NULL,
    suffix           varchar(255) DEFAULT ''  NOT NULL,
    text             varchar(255) DEFAULT ''  NOT NULL,
    img_predefined   varchar(255) DEFAULT '1' NOT NULL,
    img              int(11) unsigned DEFAULT '0',
    PRIMARY KEY (uid),
    KEY              parent (pid),
);

#
# Table structure for table 'tx_news_domain_model_news '
#
CREATE TABLE tx_news_domain_model_news (
	event_type varchar(255) DEFAULT '' NOT NULL
);
