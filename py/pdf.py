## {{{ http://code.activestate.com/recipes/572160/ (r1)
import cStringIO
import ho.pisa as pisa
import os, sys
#import tempfile

# Shortcut for dumping all logs on screen
pisa.showLogging()

def HTML2PDF(data, filename, open=False):
    """
    Simple test showing how to create a PDF file from
    PML Source String. Also shows errors and tries to start
    the resulting PDF
    """

    pdf = pisa.CreatePDF(
        cStringIO.StringIO(data),
        file(filename, "wb"))
    #print tempfile.gettempdir()

    #if open and (not pdf.err):
        #os.startfile(str(filename))
        #system('xdg-open', filename)

    return not pdf.err

if __name__=="__main__":
    HTMLTEST = """
    <html>
    </html>
    """
    print len(sys.argv);
    if len(sys.argv) <= 1:
		#no file name 
		print 0
		sys.exit(0)
    #print sys.argv[1];
    #print len(sys.argv);
    f = open(sys.argv[1]+'.html')
    HTMLTEST = f.read()
    
    HTML2PDF(HTMLTEST, sys.argv[1]+".pdf", open=True)
## end of http://code.activestate.com/recipes/572160/ }}}
