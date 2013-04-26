if [ $# -ne 1 ]
then
	echo "Usage: evn.sh [setup|teardown]"
	return
fi

if [ "$1" == "setup" ]
then
	export OLD_PATH=$PATH;
	PATH="$PWD/vendor/bin:$PATH"
fi

if [ "$1" == "teardown" ]
then
	PATH=$OLD_PATH
	env -u "OLD_PATH" > /dev/null
fi
