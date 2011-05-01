# Be sure to restart your server when you modify this file.

# Your secret key for verifying cookie session data integrity.
# If you change this key, all old sessions will become invalid!
# Make sure the secret is at least 30 characters and all random, 
# no regular words or you'll be exposed to dictionary attacks.
ActionController::Base.session = {
  :key         => '_appAutoRestart_session',
  :secret      => '5be903a613d21d4459c61a44fdd4999e8519f5e817863efd59f80db4d1c000c540b68e78524840884b3eee54b11d4e69762663edb6d09c5bd8f5a1ec37635c1d'
}

# Use the database for sessions instead of the cookie-based default,
# which shouldn't be used to store highly confidential information
# (create the session table with "rake db:sessions:create")
# ActionController::Base.session_store = :active_record_store
