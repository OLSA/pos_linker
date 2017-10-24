# -*- coding: utf-8 -*-
from __future__ import unicode_literals
from . import __version__ as app_version

app_name = "pos_linker"
app_title = "POS Linker"
app_publisher = "Oluic Sasa, OLSA"
app_description = "Connection with local printer"
app_icon = "octicon octicon-link"
app_color = "orange"
app_email = "sasaoluic@yahoo.com"
app_license = "MIT"

# Includes in <head>
# ------------------

# include js, css files in header of desk.html
# app_include_css = "/assets/pos_linker/css/pos_linker.css"
# app_include_js = "/assets/pos_linker/js/pos_linker.js"

# include js, css files in header of web template
# web_include_css = "/assets/pos_linker/css/pos_linker.css"
# web_include_js = "/assets/pos_linker/js/pos_linker.js"

# include js in page
page_js = {"point-of-sale" : "public/js/pos_linker.js"}

# include js in doctype views
# doctype_js = {"doctype" : "public/js/doctype.js"}
# doctype_list_js = {"doctype" : "public/js/doctype_list.js"}
# doctype_tree_js = {"doctype" : "public/js/doctype_tree.js"}
# doctype_calendar_js = {"doctype" : "public/js/doctype_calendar.js"}

# Home Pages
# ----------

# application home page (will override Website Settings)
# home_page = "login"

# website user home page (by Role)
# role_home_page = {
#	"Role": "home_page"
# }

# Website user home page (by function)
# get_website_user_home_page = "pos_linker.utils.get_home_page"

# Generators
# ----------

# automatically create page for each record of this doctype
# website_generators = ["Web Page"]

# Installation
# ------------

# before_install = "pos_linker.install.before_install"
# after_install = "pos_linker.install.after_install"

# Desk Notifications
# ------------------
# See frappe.core.notifications.get_notification_config

# notification_config = "pos_linker.notifications.get_notification_config"

# Permissions
# -----------
# Permissions evaluated in scripted ways

# permission_query_conditions = {
# 	"Event": "frappe.desk.doctype.event.event.get_permission_query_conditions",
# }
#
# has_permission = {
# 	"Event": "frappe.desk.doctype.event.event.has_permission",
# }

# Document Events
# ---------------
# Hook on document methods and events

# doc_events = {
# 	"*": {
# 		"on_update": "method",
# 		"on_cancel": "method",
# 		"on_trash": "method"
#	}
# }

# Scheduled Tasks
# ---------------

# scheduler_events = {
# 	"all": [
# 		"pos_linker.tasks.all"
# 	],
# 	"daily": [
# 		"pos_linker.tasks.daily"
# 	],
# 	"hourly": [
# 		"pos_linker.tasks.hourly"
# 	],
# 	"weekly": [
# 		"pos_linker.tasks.weekly"
# 	]
# 	"monthly": [
# 		"pos_linker.tasks.monthly"
# 	]
# }

# Testing
# -------

# before_tests = "pos_linker.install.before_tests"

# Overriding Whitelisted Methods
# ------------------------------
#
# override_whitelisted_methods = {
# 	"frappe.desk.doctype.event.event.get_events": "pos_linker.event.get_events"
# }

