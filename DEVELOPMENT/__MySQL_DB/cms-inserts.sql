# l_r_id, l_r_name
INSERT INTO cms.LOOKUP_ROLES VALUES (1, ''admin'');
INSERT INTO cms.LOOKUP_ROLES VALUES (2, ''editor'');
INSERT INTO cms.LOOKUP_ROLES VALUES (3, ''author'');

# u_id, u_fname, u_lname, u_username, u_pass, u_salt, u_createdby
INSERT INTO cms.USER (u_fname, u_lname, u_username, u_pass, u_salt, u_createdby)
 VALUES (''Test'', ''Testington'', ''testington'', ''password'', ''1234567890'', 1);

# u_r_id, u_r_u_id, u_r_l_r_id
INSERT INTO cms.USER_ROLES VALUES (1, 1, 1);
INSERT INTO cms.USER_ROLES VALUES (2, 1, 2);
INSERT INTO cms.USER_ROLES VALUES (3, 1, 3);

# s_id, s_name, s_desc, s_style, s_active, s_createdby
INSERT INTO cms.STYLE (s_id, s_name, s_desc, s_style, s_active, s_createdby)
 VALUES (1, ''Default'', ''Default'', ''body { display: block }'', 1, 1);
INSERT INTO cms.STYLE (s_id, s_name, s_desc, s_style, s_active, s_createdby)
 VALUES (2, ''Inverse'', ''Colors inverted.'', ''body { background-color: black; text-color: white }'', 0, 1);

# p_id, p_name, p_alias, p_desc, p_style, p_createdby
INSERT INTO cms.PAGES (p_id, p_name, p_alias, p_desc, p_createdby)
		VALUES (1, ''test1'', ''test1'', ''First test page'', 1);
INSERT INTO cms.PAGES (p_id, p_name, p_alias, p_desc, p_createdby)
		VALUES (2, ''test2'', ''test2'', ''Second test page'', 1);

# c_a_id, c_a_name, c_a_alias, c_a_desc, c_a_order, c_a_createdby
INSERT INTO cms.CONTENT_AREAS (c_a_id, c_a_name, c_a_alias, c_a_desc, c_a_order, c_a_createdby)
 VALUES (1, ''Header'', ''header'', ''Header content area'', 1, 1);
INSERT INTO cms.CONTENT_AREAS (c_a_id, c_a_name, c_a_alias, c_a_desc, c_a_order, c_a_createdby)
 VALUES (2, ''Article'', ''article'', ''Article content area'', 2, 1);
INSERT INTO cms.CONTENT_AREAS (c_a_id, c_a_name, c_a_alias, c_a_desc, c_a_order, c_a_createdby)
 VALUES (3, ''Footer'', ''footer'', ''Footer content area'', 3, 1);

# a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby
INSERT INTO cms.ARTICLE (a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby)
 VALUES (1, 1, ''header1_test'', ''Test1'', ''<h1>Test Header</h1>'', 1, 1);
INSERT INTO cms.ARTICLE (a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby)
 VALUES (2, 1, ''header2_test'', ''Test2'', ''<h1>Test Headerr</h1>'', 2, 1);
INSERT INTO cms.ARTICLE (a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby)
 VALUES (3, 2, ''article1_test'', ''Test3'', ''<h1>Test Article</h1>'', 1, 1);
INSERT INTO cms.ARTICLE (a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby)
 VALUES (4, 2, ''article2_test'', ''Test4'', ''<h1>Test Articler</h1>'', 2, 1);
INSERT INTO cms.ARTICLE (a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby)
 VALUES (5, 3, ''footer1_test'', ''Test5'', ''<h1>Test Footer</h1>'', 1, 1);
INSERT INTO cms.ARTICLE (a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby)
 VALUES (6, 3, ''footer2_test'', ''Test6'', ''<h1>Test Footerr</h1>'', 2, 1);