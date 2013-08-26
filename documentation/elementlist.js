
var ApiGen = ApiGen || {};
ApiGen.elements = [["f","_T()"],["f","action_event()"],["f","active_extension()"],["f","add_action()"],["f","add_alert()"],["f","add_cache_object()"],["f","add_hook()"],["f","add_install_alert()"],["f","add_install_error()"],["f","add_template()"],["f","add_theme_helper()"],["c","Bootstrap"],["f","cms_menubar()"],["f","cms_menubar_defaults()"],["f","cms_menubar_items()"],["f","cms_menubar_save()"],["f","cms_page()"],["f","cms_sidebar()"],["c","Config"],["c","ConfigBase"],["f","count_install_errors()"],["f","cut_text()"],["f","db_create_table()"],["f","db_decode()"],["f","db_delete()"],["f","db_done()"],["f","db_drop_table()"],["f","db_encode()"],["f","db_free()"],["f","db_get_query()"],["f","db_getInsertId()"],["f","db_insert()"],["f","db_next()"],["f","db_numrows()"],["f","db_query()"],["f","db_reset()"],["f","db_select()"],["f","db_update()"],["c","DBRelation"],["f","default_admin_theme_foot()"],["f","default_admin_theme_head()"],["f","do_action()"],["f","do_session_restart()"],["f","do_session_start()"],["f","do_session_stop()"],["c","Domain"],["c","DomainBase"],["c","elFinder"],["c","elFinderConnector"],["f","elFinderFileAccessControl()"],["c","elFinderVolumeDriver"],["c","elFinderVolumeLocalFileSystem"],["c","Environment"],["c","EnvironmentInterface"],["c","Exception"],["f","exec_admin_controller()"],["f","exec_api_controller()"],["f","execReorder()"],["c","Extension"],["c","File"],["f","file_upload()"],["f","file_write()"],["f","filter_array_by_level()"],["f","get_active_langs()"],["f","get_active_locales()"],["f","get_admin_action_link()"],["f","get_admin_api_action_link()"],["f","get_admin_breadcrumb()"],["f","get_admin_breadcrumb_configuration()"],["f","get_admin_breadcrumb_content()"],["f","get_admin_breadcrumb_structure()"],["f","get_admin_dashboard()"],["f","get_admin_mode_configuration()"],["f","get_admin_mode_content()"],["f","get_admin_mode_structure()"],["f","get_admin_modes_configuration()"],["f","get_admin_modes_content()"],["f","get_admin_modes_content_theme()"],["f","get_admin_modes_dashboard()"],["f","get_admin_modes_extensions()"],["f","get_admin_modes_media()"],["f","get_admin_modes_structure()"],["f","get_admin_reverse()"],["f","get_alerts()"],["f","get_api_environment()"],["f","get_backend_theme_dir()"],["f","get_backend_theme_url()"],["f","get_backend_themes()"],["f","get_base_url()"],["f","get_base_url_admin()"],["f","get_base_url_api()"],["f","get_breadcrumb()"],["f","get_cache_object()"],["f","get_ckeditor_api_link()"],["f","get_config()"],["f","get_date()"],["f","get_date_format()"],["f","get_datetime()"],["f","get_datetime_format()"],["f","get_default_pagegroup()"],["f","get_default_pagetaxnomy()"],["f","get_domain()"],["f","get_domain_canonical()"],["f","get_domain_id()"],["f","get_domain_name()"],["f","get_domain_request_id()"],["f","get_domains_alias()"],["f","get_domains_canonicals()"],["f","get_domains_tree()"],["f","get_elfinder_api_link()"],["f","get_extensions_list()"],["f","get_file_extension()"],["f","get_file_name()"],["f","get_file_url()"],["f","get_flag_url()"],["f","get_frontend_theme_dir()"],["f","get_frontend_themes()"],["f","get_hooks()"],["f","get_html_attr()"],["f","get_install_alerts()"],["f","get_install_next_step_link()"],["f","get_install_reinstall_link()"],["f","get_install_request_step()"],["f","get_install_step()"],["f","get_install_step_link()"],["f","get_install_steps()"],["f","get_install_url()"],["f","get_json_alerts()"],["f","get_lang()"],["f","get_lang_flags()"],["f","get_lang_iso()"],["f","get_langs()"],["f","get_language_default()"],["f","get_language_info()"],["f","get_link()"],["f","get_link_dir()"],["f","get_locales()"],["f","get_logout()"],["f","get_menubar_links()"],["f","get_metatag()"],["f","get_metatag_description()"],["f","get_metatag_keywords()"],["f","get_metatag_title()"],["f","get_mode()"],["f","get_modes()"],["f","get_module()"],["f","get_modules()"],["f","get_mysql_collates()"],["f","get_objtaxonomy()"],["f","get_objtaxonomy_list()"],["f","get_page()"],["f","get_page_pagetype()"],["f","get_pagegroup()"],["f","get_pagegroups()"],["f","get_pages()"],["f","get_pagetaxonomies()"],["f","get_pagetaxonomy()"],["f","get_pagetype()"],["f","get_pagetypes()"],["f","get_protocol()"],["f","get_registered_hook()"],["f","get_registered_hooks()"],["f","get_request_action()"],["f","get_request_filter()"],["f","get_request_g()"],["f","get_request_gp()"],["f","get_request_group()"],["f","get_request_id()"],["f","get_request_mode()"],["f","get_request_module()"],["f","get_request_p()"],["f","get_request_page()"],["f","get_request_parent()"],["f","get_request_sgp()"],["f","get_session_id()"],["f","get_session_name()"],["f","get_session_value()"],["f","get_template()"],["f","get_templates()"],["f","get_templates_content()"],["f","get_texonomy_elements()"],["f","get_theme_config()"],["f","get_theme_dir()"],["f","get_theme_group()"],["f","get_theme_groups()"],["f","get_theme_homepage()"],["f","get_theme_homepage_id()"],["f","get_theme_info()"],["f","get_theme_list()"],["f","get_theme_taxonomies()"],["f","get_theme_taxonomy()"],["f","get_theme_type()"],["f","get_theme_types()"],["f","get_theme_url()"],["f","get_themes()"],["f","get_time()"],["f","get_time_format()"],["f","get_timezones()"],["f","get_url()"],["f","get_user()"],["f","get_user_id()"],["f","get_user_level()"],["f","get_user_list()"],["f","get_user_name()"],["f","getIP()"],["f","hook()"],["c","I18N"],["c","Iceberg"],["f","iceberg_api_generate_admin()"],["f","iceberg_api_generate_ckeditor()"],["f","iceberg_api_generate_elfinder()"],["c","IcebergAPI"],["c","IcebergBackend"],["c","IcebergCache"],["c","IcebergException"],["c","IcebergExceptionBase"],["c","IcebergExceptionBaseInterface"],["c","IcebergFrontend"],["f","in_admin()"],["f","in_admin_dashboard()"],["f","in_admin_login()"],["f","in_api()"],["f","in_maintenance()"],["f","in_web()"],["c","Install"],["f","install_check_requeriments()"],["f","install_compatible_version()"],["f","install_db_file_writable()"],["f","install_temp_dir_writable()"],["f","install_uploads_dir_writable()"],["f","is_active_language()"],["f","is_admin()"],["f","is_api_admin()"],["f","is_logged()"],["f","is_login()"],["f","is_maintenance_allowed()"],["f","is_visible_language()"],["f","isset_session_value()"],["f","language_navbar_defaults()"],["f","language_navbar_show()"],["c","LinksListWidget"],["f","load_language_extension()"],["f","load_theme_config()"],["f","locate()"],["c","Maintenance"],["f","maintenance()"],["c","Menubar"],["c","Metatag"],["c","MySQL"],["f","mysql_escape()"],["c","MySQLBase"],["c","Number"],["c","ObjectConfig"],["c","ObjectConfigBase"],["c","ObjectConfigInterface"],["c","ObjectDB"],["c","ObjectDBBase"],["c","ObjectDBBaseInterface"],["c","ObjectDBInterface"],["c","ObjectDBRelations"],["c","ObjectTaxonomy"],["f","order_register_hook()"],["c","Page"],["f","page_sort_by_name()"],["c","PageBase"],["c","PageConfig"],["c","PageGroup"],["c","PageMeta"],["c","PageTaxonomy"],["c","PageType"],["c","PHPMailer"],["c","phpmailerException"],["f","phpVersionCompatible()"],["f","print_html_attr()"],["f","print_link()"],["f","print_link_dir()"],["f","print_template()"],["f","print_text()"],["f","print_theme_url()"],["f","printPagesHTMLTree()"],["c","Query"],["c","RandomTextWidget"],["f","register_hook()"],["f","remove_action()"],["f","remove_cache_object()"],["f","remove_hook()"],["f","remove_template()"],["f","reOrderArray()"],["c","Request"],["c","Routing"],["c","RoutingAPI"],["c","RoutingBackend"],["c","RoutingBackendAPI"],["c","RoutingFrontend"],["c","RoutingInterface"],["f","save_config()"],["f","save_theme_config()"],["f","select_all_config()"],["f","select_all_config_objects()"],["f","select_config()"],["f","select_config_object()"],["f","select_config_object_by_id()"],["c","Session"],["f","set_config()"],["f","set_domain_id()"],["f","set_domain_request_id()"],["f","set_registered_hook()"],["f","set_request_g()"],["f","set_request_p()"],["f","set_session_value()"],["f","structure_objtaxonomy_config_by_mode()"],["f","structure_objtaxonomy_edit_by_mode()"],["c","Taxonomy"],["c","TaxonomyElements"],["c","TaxonomyElementsBase"],["c","TaxonomyElementsInterface"],["c","TE_Geolocation"],["c","TE_Images"],["c","TE_Input"],["c","TE_Relation"],["c","TE_Text"],["c","Template"],["c","TemplateBase"],["c","Theme"],["f","theme_enqueue_script()"],["f","theme_enqueue_style()"],["f","theme_foot()"],["f","theme_footer()"],["f","theme_head()"],["f","theme_header()"],["f","theme_page()"],["f","theme_print_foot_ckeditor()"],["f","theme_print_foot_elfinder()"],["f","theme_register_script()"],["f","theme_register_style()"],["c","ThemeAPI"],["c","ThemeBackend"],["c","ThemeBackendAPI"],["c","ThemeBase"],["c","ThemeCore"],["c","ThemeFrontend"],["c","ThemeInterface"],["c","Time"],["f","unactive_extension()"],["f","unregister_hook()"],["f","unsave_config()"],["f","unset_config()"],["f","unset_session_value()"],["c","User"],["c","UserBase"],["c","UserMeta"],["f","users_encrypt_password()"],["c","Widget"],["c","WidgetBase"]];
