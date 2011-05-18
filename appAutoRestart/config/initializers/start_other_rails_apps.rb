logger = Logger.new(RAILS_ROOT + '/log/start_other_rails_apps.log')
logger.info("\nRuning start_other_rails_apps at " + Time.now.to_s)

APP_NAME_INDEX = 0
APP_START_COMMAND_INDEX = 1
RAILS_APP_INSTANCES_TO_CHECK = [
  ['demo.wontology.org',     # demo environment
   'cd /home/glenivey/demo.wontology.org/current && bundle exec mongrel_rails start -d -p 12035 -e production -P log/mongrel.pid < /dev/null >& log/mongrel_out'],
  ['fred.wontology.org',     # staging environment
   'cd /home/glenivey/fred.wontology.org/current/vendor/wontomedia && bundle exec mongrel_rails start -d -p 12046 -e production -P log/mongrel.pid < /dev/null >& log/mongrel_out'],
  ['wontology.org',          # production site
   'cd /home/glenivey/wontology.org/current/bundle/ruby/1.8/gems/wontomedia-* && bundle exec mongrel_rails start -d -p 12024 -e production -P log/mongrel.pid < /dev/null >& log/mongrel_out'],
  ['adasdaughters.org',      # production site
   'cd /home/glenivey/adasdaughters.org/current/bundle/ruby/1.8/gems/wontomedia-*  && bundle exec mongrel_rails start -d -p 12029 -e production -P log/mongrel.pid < /dev/null >& log/mongrel_out']
]

COMMAND_PREFIX = 'ruby /home/glenivey/'

processes = `ps hauxww`.split("\n")

RAILS_APP_INSTANCES_TO_CHECK.each do |app_info|
  app_name = app_info[APP_NAME_INDEX]
  app_start_command = app_info[APP_START_COMMAND_INDEX]

  found_process = false
  processes.each do |process_line|
    if process_line =~ /#{COMMAND_PREFIX}#{app_name}/
      found_process = true
      logger.info("running: " + app_name)
      break
    end
  end

  unless found_process
    logger.info("start: " + app_name)
    system "/bin/bash -l -c '#{app_start_command}'"
  end
end
