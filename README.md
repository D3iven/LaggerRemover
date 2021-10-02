# Lagger Remover
With this plugin you can disallow players that have a certain ping from joining your server!

# Config
```
---
#if set to false the plugin will only check player ping when they join.
#if set to true the plugin will constantly check for players that exceed the maximum allowed ping writen in "max-ping".
always-check: true

#palyers that exceed the ammount of ping writen below will get kicked.
max-ping: 200

#write here the message you want to sent the player when they get kicked.
# {ping} = the players ping.
kick-message: "you have exceeded the maximum ammount of ping. Your ping: {ping}."

#player names that are listed here will be immune to being kicked for exceeding the maximum allowed ping.
whitelisted-players:
 - "examplePlayerName1"
 - "examplePlayerName2"
...
```

# Features
- Customize the ammount of ping the player has to have for them to get kicked 
- Whitelist players that you don't want to get kicked even tho they exceed the maximum ping

# Discord
contact me on discord Phqzing#1524 if you have any issues with the plugin or if you want me to fix / create a plugin for you.
