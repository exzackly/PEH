//
//  loginViewController.swift
//  FoxFix
//
//  Created by EXZACKLY on 4/9/16.
//  Copyright © 2016 EXZACKLY. All rights reserved.
//

import UIKit

class loginViewController: UIViewController {
    
    var uid: Int?
    var loginFilePath: String {
        return (NSFileManager.defaultManager().URLsForDirectory(.DocumentDirectory, inDomains: .UserDomainMask).first! as NSURL).URLByAppendingPathComponent("login").path!
    }
    
    @IBOutlet weak var usernameTextField: UITextField!
    @IBOutlet weak var passwordTextField: UITextField!
    
    @IBAction func login(sender: UIButton) {
        do {
            let result = try String(contentsOfURL: NSURL(string: "http://www.exzackly7.com/PEH/backend/verifyCredentials.php?eml=\(usernameTextField.text!.stringByReplacingOccurrencesOfString(" ", withString: ""))&pwd=\(passwordTextField.text!.stringByReplacingOccurrencesOfString(" ", withString: ""))")!)
            if result != "false" {
                uid = Int(result)
                NSKeyedArchiver.archiveRootObject(uid!, toFile: loginFilePath)
                dismissViewControllerAnimated(true, completion: nil)
            } else {
                let loginAlert = UIAlertController(title: "Login Failed", message: nil, preferredStyle: .Alert)
                loginAlert.addAction(UIAlertAction(title: "Dismiss", style: .Cancel, handler: nil))
                presentViewController(loginAlert, animated: true, completion: nil)
            }
        } catch let error {
            print(error)
        }
    }

}
