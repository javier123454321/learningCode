import hashlib as hasher
import datetime as date

def proof_of_work(last_proof, nonce, difficulty):
    '''
Takes a string which whould be the proof of work of previous block, appends a nonce
and iterates through this nonce until the last proof, with the nonce appended gives you
a sha256 hash with the number of leading 0s according to the difficulty

    '''


    item_to_test = str(last_proof + str(nonce))
    hash_of_item = str(hasher.sha256(str(item_to_test)).hexdigest())

    #Ensure that the leading numbers of the hash are all zeros according to the difficulty
    
    i = (difficulty)
    while str(hash_of_item[0:i]) != '0' * difficulty:
        nonce += 1
        item_to_test = str(last_proof + str(nonce))
        hash_of_item = str(hasher.sha256(str(item_to_test)).hexdigest())
        
        
        
        #=========================START Debugging Code=========================#
        # print "New nonce to test = %s" % nonce
        # print "New item to test %s" % item_to_test
        # print "New hash of item = %s" % hash_of_item
        # print
        # print"-----------------------------"
        # print
        # print
        #=========================END Debugging Code=========================#
        
        
    print "POW nonce = %s" % nonce
    print "hash = %s" % hash_of_item
    return nonce

proof_of_work(str(hasher.sha256("asd").hexdigest()), 102900000, 6)
