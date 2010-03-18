require "ostruct"

WontoMedia = OpenStruct.new({
  :site_title => "AdasDaughters.org",
  :site_tagline => "Notable women in technology and science",
  :site_logo_title => "<div style='margin-bottom: 0.5em; margin-top: 0.25em; text-align: center;'><span style='color: black; font-family: cursive; font-style: italic; font-size: 130%;'>Ada<span style='color: #b0b0ff;'>'</span>s Daughters</span></div>",

  :help_url_prefix  => "http://wiki.wontology.org/wiki/help.php?title=",
  :popup_url_prefix => "http://wiki.wontology.org/wiki/popup.php?title=",
  :site_content_url_prefix =>
    "http://wiki.wontology.org/wiki/help.php?title=Wontology:",
  :site_content_url_postfix => '',

  :ads => OpenStruct.new({
    :amazon => OpenStruct.new({
      :associate_id => "adasdaughters-20"
    }),
    :google => OpenStruct.new({
      :publisher_id => "pub-2447626445162341",
      :data_page_links => "0711913804",            # Ada's Daughters Links
      :data_page_slot => "9425636150"              # Ada's Daughters Column
    })
  }),

  :analytics => OpenStruct.new({
    :google => OpenStruct.new({
      :profile_id => "UA-13113606-2"
    })
  })
})
