import os.path
import time

# class for a Jekyll post
class Post:
    def __init__(self, title):
        self.title = title
        self.type = "md"
        self.date = self.getJekyllDate()
        self.outDir = "."
        self.layout = ""
        self.extras = {}

    # add a custom property to the header of the post
    def addExtra(self, key, value):
        self.extras[key] = value

    # get a human readable version of the title ie. '-' replaced with spaces
    def getReadableTitle(self):
        words = self.title.split("-")
        if len(words) == 1:
            return words[0].capitalize()
        else:
            return words[0].capitalize() + " " + " ".join(words[1:])

    # get the file extension of the new post, based on the type
    def getFileExtension(self):
        if self.type in ("md", "markdown"):
            return "md"
        if self.type == "html":
            return "html"
        return self.type

    # get the Jekyll formatted file name ie. <year>-<month>-<day>-<title>.<extension>
    def getFileName(self):
        return "{}-{}.{}".format(self.date, self.title, self.getFileExtension())

    # get the absolute path of the new post
    def getFilePath(self):
        return os.path.join(self.outDir, self.getFileName())

    def getJekyllDate(self):
        return time.strftime("%Y-%m-%d")

    # create the new post with the generated header
    def create(self):
        # if the file already exists, throw an error rather than overwriting
        if os.path.exists(self.getFilePath()):
            raise Exception("There is already a post called {} at {}".format(self.title, self.getFilePath()))

        f = open(self.getFilePath(), 'w')
        f.write("---\n")
        self._writeProperty(f, "title", self.getReadableTitle())
        self._writeProperty(f, "layout", self.layout)
        for key in self.extras:
            self._writeProperty(f, key, self.extras[key])
        f.write("---\n")
        f.close()

    # write a header property in Jekyll's format
    # if the value is empty, the property will not be written
    def _writeProperty(self, file, key, value):
        if len(value) > 0:
            file.write("{}: {}\n".format(key, value.strip()))
