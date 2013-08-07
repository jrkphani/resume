#####################################################################################################
#Author : Manikandan R																				#
#Email : manikandan@digitalchakra.in																#
#This file is used to compress the js and css files from folders and put it into another folder		#
# Which is using yuicompressor from http://yuilibrary.com/download/#yuicompressor					#
#####################################################################################################


files=`find js -name "*.js"`

echo "=======  S  T  A  R  T        J  S         C  O  M  P  R  E  S  S  ======="
for i in $files;
do
	echo "Starting compress for "$i
    ##############################
    #using compiler for js only
    #Debug mode
    #java -jar compiler.jar $i --js_output_file new/$i.js
    
    #Non debug mode
    #java -jar compiler.jar $i --compilation_level SIMPLE_OPTIMIZATIONS --js_output_file compressed/$i --warning_level QUIET --summary_detail_level 3
    ##############################
    
    ##############################
    #using yuicompressor
    
    #Debug mode
    #java -jar yuicompressor-2.4.jar $i -o compressed/$i --charset utf-8 --verbose
    
    java -jar yuicompressor-2.4.jar $i -o compressed/$i --charset utf-8
    
    
    ##############################
    echo "Compress finished for "$i
    echo "==========================="
done

echo "=======  J  S         C  O  M  P  R  E  S  S         D  O  N  E  ======="
echo 
echo 
echo 
echo 
files=`find css -name "*.css"`

echo "=======  S  T  A  R  T        C  S  S         C  O  M  P  R  E  S  S  ======="
for i in $files;
do
	echo "Starting compress for "$i
	#Debug mode
	#java -jar yuicompressor-2.4.jar $i -o compressed/$i --charset utf-8 --verbose
	
	#Non debug mode
	java -jar yuicompressor-2.4.jar $i -o compressed/$i --charset utf-8
	
	echo "Compress finished for "$i
    echo "==========================="
done
	echo "=======  J  S         C  O  M  P  R  E  S  S         D  O  N  E  ======="
	
echo 
echo 
echo 
echo 

echo "=======  S T A R T      M O V I N G     I M A G E S    A N D   F O N T S    T O    C O M P R E S S E D   F O L D E R    ======="

#rmove the old files
rm -R compressed/fonts
rm -R compressed/img

#copy folders
cp -R fonts compressed
cp -R img compressed

echo 
echo 
echo 
echo 
echo "=======  I M A G E S    A N D   F O N T S    A R E   M O V E D T O    C O M P R E S S E D   F O L D E R    ======="