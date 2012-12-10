require 'rubygems'
require 'tumblr_client'

Tumblr.configure do |config|
    config.consumer_key = ""
    config.consumer_secret = ""
    config.oauth_token = ""
    config.oauth_token_secret = ""
end

client = Tumblr.new
photo_url = ARGV[0]
caption = ARGV[1]
puts client.photo("movielibs.tumblr.com", :source => photo_url, :caption => caption)
