require 'rubygems'
require 'tumblr_client'

Tumblr.configure do |config|
    config.consumer_key = "KuLUj5eO82pXobQxLSORvDbwAApySZU06Ai9BUUon5DMtBXT7x"
    config.consumer_secret = "BlHl4cc4Uad3UMOKd8B9CkuYM4vq99aAtyoHyWIE4dp4XjYoSo"
    config.oauth_token = "UqbqvDdYgFhmyhf4ACKAxm0aQBvLySGiBH46zuVHSoZ6IbGX52"
    config.oauth_token_secret = "JlDHYu9QZZJ7dtLL04i0bPLaGCwayWLTaYJiVyv4DeWKv7mA9X"
end

client = Tumblr.new
photo_url = ARGV[0]
caption = ARGV[1]
puts client.photo("movielibs.tumblr.com", :source => photo_url, :caption => caption)
