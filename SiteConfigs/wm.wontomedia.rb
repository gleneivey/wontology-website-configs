# WontoMedia - a wontology web application
# Copyright (C) 2010 - Glen E. Ivey
#    www.wontology.com
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License version
# 3 as published by the Free Software Foundation.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU Affero General Public License for more details.
#
# You should have received a copy of the GNU Affero General Public License
# along with this program in the file COPYING and/or LICENSE.  If not,
# see <http://www.gnu.org/licenses/>.


require "ostruct"

WontoMedia = OpenStruct.new({
  :site_title => "Wontology.org",
  :site_tagline => "Wontology.org",

  :help_url_prefix  => "http://wiki.wontology.org/wiki/help.php?title=",
  :popup_url_prefix => "http://wiki.wontology.org/wiki/popup.php?title=",
  :site_content_url_prefix =>
    "http://wiki.wontology.org/wiki/help.php?title=Wontology:",
  :site_content_url_postfix => '',

  :ads => OpenStruct.new({
    :amazon => OpenStruct.new({
      :associate_id => "wontology-20"
    }),
    :google => OpenStruct.new({
      :publisher_id => "pub-2447626445162341",
      :data_page_slot => "4071806725"
    })
  }),

  :analytics => OpenStruct.new({
    :google => OpenStruct.new({
      :profile_id => "UA-13113606-1"
    })
  })
})