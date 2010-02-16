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


module WontologyHelper
  def link_to_node_by_name(name, text=nil)
    unless defined? @nodes_by_name
      init_name_to_node_hash
    end
    n = @nodes_by_name[name]
    return link_to( (text ? text : h(n.title)), node_path(n) )
  end

  def init_name_to_node_hash
    @nodes_by_name = {}
    @nouns.each do |node|
      @nodes_by_name[node.name] = node
    end
  end
end
