import configparser


def get_config(config_filename='config.yml'):
    config_raw_parser = configparser.RawConfigParser()
    config_file_path = r'./config/{0}'.format(config_filename)
    config_raw_parser.read(config_file_path)
    return config_raw_parser


def get_discord_bot_token():
    config_key = 'discord-bot-config'
    config_parser = get_config()
    bot_token = config_parser.get(config_key, 'bot_token')
    return bot_token
