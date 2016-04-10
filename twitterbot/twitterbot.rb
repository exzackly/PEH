#!/usr/bin/env ruby

require 'Twitter'
require 'open-uri'

OpenSSL::SSL::VERIFY_PEER = OpenSSL::SSL::VERIFY_NONE

client = Twitter::REST::Client.new do |config|
  config.consumer_key        = ""
  config.consumer_secret     = ""
  config.access_token        = ""
  config.access_token_secret = ""
end

output = ''

open('http://www.exzackly7.com/PEH/backend/displayImprovements.php') {|f|
  f.each_line {|line| output += line}
}

top = output.split('#')[1]

num_ideas = output.split(';').length

while true do
	
	client.update("There are currently " + num_ideas.to_s + " pending ideas from FoxFix users!")
	client.update("Top Idea of the Day: " + top)
	sleep(86400) # wait a whole day lol
end